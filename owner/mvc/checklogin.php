
<?php
include_once("../configs/config.php");
include_once("../configs/functions.php");

if (isset($_POST['signin'])) {
    $username_email_phone = $_POST['username'];
    $showroom_owner_login_password = $_POST['password'];

    // Display error msg
    $err = array();

    // Validate mobile number
    $validated_mobile_number = mobile_validation($username_email_phone);
    if (empty($validated_mobile_number)) {
        $err[] = "Please enter a valid mobile number";
    }

    if ($_POST['password'] == '') {
        $err[] = "Please enter password";
    }

    $n = count($err);

    if ($n > 0) {
        $msg = "<ol>";

        for ($i = 0; $i < $n; $i++) {
            $msg .= "<li>" . $err[$i] . "</li>";
        }
        $msg .= "</ol>";
        $_SESSION['msg'] = $msg;
    } else {
        
        $validated_mobile_number = mobile_validation($validated_mobile_number);

        // without level_id
        $ql = mysqli_query($con, "SELECT user_id,showroom_name,showroom_owner_name,showroom_owner_password FROM sms_users WHERE showroom_owner_mobile='$validated_mobile_number' AND status=1");
        $qn = mysqli_num_rows($ql);
        $qr = mysqli_fetch_array($ql);
        $sid = $qr['user_id'];
        $showroom_name = $qr['showroom_name'];
        $showroom_owner_name = $qr['showroom_owner_name'];
        $db_showroom_owner_password = $qr['showroom_owner_password'];

//checking password

if(password_verify(($showroom_owner_login_password), $db_showroom_owner_password)){
    $password = 1;
}else{
     $password = 0;
}


        if ($qn == 1 && $password ==1) {
            session_start();
            $_SESSION['sess_user_id'] = $sid;
            $_SESSION['sess_showroom_name'] = $showroom_name;
            $_SESSION['sess_showroom_owner_name'] = $showroom_owner_name;

            header('Location: ../');
            exit();
        } else {
            session_start();
            $_SESSION['msg'] = 'Wrong username or password';
            header('Location: ../');
            exit();
        }
    }
}
?>

