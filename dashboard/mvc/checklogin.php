<?php
include_once("../configs/config.php");
include_once("../configs/functions.php");

if (isset($_POST['signin'])) {
    $username_email_phone = $_POST['username'];
    $user_login_password = $_POST['password'];

    // Display error msg
    $err = array();


    if (empty($username_email_phone)) {
        $err[] = "Please enter a valid email";
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

		// without level_id
        $ql = mysqli_query($con, "SELECT admin_id,admin_name,admin_password FROM sms_admins WHERE admin_email='$username_email_phone' AND status=1");
        $qn = mysqli_num_rows($ql);
        $qr = mysqli_fetch_array($ql);
        $sid = $qr['admin_id'];
        $admin_name = $qr['admin_name'];
        $db_admin_password = $qr['admin_password'];

//checking password

if(password_verify(($user_login_password), $db_admin_password)){
    $password = 1;
}else{
     $password = 0;
}


        if ($qn == 1 && $password ==1) {
            session_start();
            $_SESSION['sess_admin_id'] = $sid;
            $_SESSION['sess_admin_name'] = $admin_name;

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
