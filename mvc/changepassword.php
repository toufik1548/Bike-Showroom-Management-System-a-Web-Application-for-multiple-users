<br>
<h4 class="fw-bold">ChangePassword</h4>

<div class="container border">
<?php

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update_password'])) {
    $old_password = trim($_POST['old_password']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);

    // Display error messages
    $err = array();

    if ($old_password == '') {
        $err[] = "Please enter your current password";
    }

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM sms_users WHERE user_id=? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "i", $logged_user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$user || !password_verify($old_password, $user['user_password'])) {
        $err[] = "Your current password does not match!";
    }

    if ($password == '') {
        $err[] = "Please enter your new password";
    }

    if ($password2 == '') {
        $err[] = "Please confirm your new password";
    }

    if ($password != $password2) {
        $err[] = "Your confirmation password does not match!";
    }

    $n = count($err);

    if ($n > 0) {
        $msg = "<div class=\"alert alert-danger\" role=\"alert\"><ol>";
        for ($i = 0; $i < $n; $i++) {
            $msg .= "<li>" . $err[$i] . "</li>";
        }
        $msg .= "</ol></div>";
        $_SESSION['msg'] = $msg;
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($con, "UPDATE sms_users SET user_password=? WHERE user_id=?");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "si", $hashed_password, $logged_user_id);
        $q = mysqli_stmt_execute($stmt);

        if ($q) {
            $_SESSION['msg'] = "<div class='alert alert-success' style='background-color: green; color: white;' role='alert'> ✔ Password updated successfully.</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' style='background-color: red; color: white;' role='alert'> ❌ Sorry! Failed to change password</div>";
        }
        mysqli_stmt_close($stmt);
    }
}

// Display existing messages if any
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!-- Continue with the rest of your HTML/PHP code -->

<div id="password">
    <br>
    <!-- form -->
    <form class="form-horizontal" action="" method="POST" id="form">
        <?php $data = array('label' => 'Old Password', 'field' => 'old_password', 'type' => 'password', 'required' => true); ?>
        <!-- Use label tag for accessibility and styling -->
        <div class="mb-3<?php if ($data['required']) echo ' required'; ?>">
            <input type="<?php echo $data['type'] ?>" name="<?php echo $data['field'] ?>" maxlength="15" placeholder="<?php echo $data['label'] ?>" id="input_<?php echo $data['field'] ?>" class="form-control<?php if ($data['required']) echo ' required'; ?>">
        </div>

        <?php $data = array('label' => 'New Password', 'field' => 'password', 'type' => 'password', 'required' => true); ?>
        <div class="mb-3<?php if ($data['required']) echo ' required'; ?>">
            <input type="<?php echo $data['type'] ?>" name="<?php echo $data['field'] ?>" maxlength="15" placeholder="<?php echo $data['label'] ?>" id="input_<?php echo $data['field'] ?>" class="form-control<?php if ($data['required']) echo ' required'; ?>">
        </div>

        <?php $data = array('label' => 'Re-type Password', 'field' => 'password2', 'type' => 'password', 'required' => true); ?>
        <div class="mb-3<?php if ($data['required']) echo ' required'; ?>">
            <input type="<?php echo $data['type'] ?>" name="<?php echo $data['field'] ?>" maxlength="15" placeholder="<?php echo $data['label'] ?>" id="input_<?php echo $data['field'] ?>" class="form-control<?php if ($data['required']) echo ' required'; ?>">
        </div>

        <div class="mb-3">
            <button type="submit" name="update_password" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<br>
<div class="alert alert-danger">
    <strong>Change Password!</strong><br>Please use a strong password. Do not use '123' or 'abc' type passwords
</div>
</div>





<!-- <?php
// $hash = password_hash("123", PASSWORD_DEFAULT);
// if (password_verify('123', $hash)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
?>
 -->