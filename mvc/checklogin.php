<?php
session_start(); // Always start the session at the beginning of your script

include_once("../configs/config.php");
include_once("../configs/functions.php");

if (isset($_POST['signin'])) {
    $username_email_phone = $_POST['username'];
    $user_login_password = $_POST['password'];

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
        $ql = mysqli_query($con, "SELECT user_id, showroom_name, user_password FROM sms_users WHERE user_mobile='$validated_mobile_number' AND status=1");
        $qn = mysqli_num_rows($ql);

        if ($qn == 1) {
            $qr = mysqli_fetch_array($ql);
            $userId = $qr['user_id'];
            $showroom_name = $qr['showroom_name'];
            $db_user_password = $qr['user_password'];

            // Checking password
            if (password_verify($user_login_password, $db_user_password)) {
                // Password is correct

                // Login activity
                $user_ip = $_SERVER['REMOTE_ADDR'];
                $loginTime = date('Y-m-d H:i:s');
                $query = "INSERT INTO sms_users_loginlogs (log_id, user_id, user_ip, login_datetime) VALUES (NULL, $userId, '$user_ip', '$loginTime')";
                mysqli_query($con, $query);

                // Set session variables
                $_SESSION['sess_user_id'] = $userId;
                $_SESSION['sess_showroom_name'] = $showroom_name;

                // Redirect to the home page
                header('Location: ../');
                exit();
            } else {
                // Incorrect password
                $_SESSION['msg'] = 'Wrong username or password';
                header('Location: ../');
                exit();
            }
        } else {
            // User not found
            $_SESSION['msg'] = 'User not found';
            header('Location: ../');
            exit();
        }
    }
}
?>
