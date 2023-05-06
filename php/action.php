<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

require_once 'auth.php';
$user = new Auth();

//handle register ajax request
if (isset($_POST['action']) && $_POST['action'] == 'register') {
    $name = $user->test_input($_POST['name']);
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $hpass = password_hash($pass, PASSWORD_DEFAULT);

    if ($user->user_exist($email)) {
        echo $user->showMessage('warning', 'This email is already registered!');
    } else {
        if ($user->register($name, $email, $hpass)) {
            echo 'register';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Something went wrong with your registration!');
        }
    }
}

//handle login ajax request
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $loggedInUser = $user->login($email);

    if ($loggedInUser != null) {
        if (password_verify($pass, $loggedInUser['password'])) {
            if (!empty($_POST['rem'])) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $pass, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }

            echo 'login';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Password is incorrect!');
        }
    } else {
        echo $user->showMessage('danger', 'User not registered!');
    }
}

//handle forgot password ajax request
if (isset($_POST['action']) && $_POST['action'] == 'forgot') {
    $email = $user->test_input($_POST['email']);

    $user_found = $user->currentUser($email);

    if ($user_found != null) {
        $token = uniqid();
        $token = str_shuffle($token);

        $user->forgot_password($token, $email);

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = Database::USERNAME;
            $mail->Password = Database::PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            
            $mail->setFrom(Database::USERNAME,'SPARK');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = '<h3>Click the link below to reset your password.<br><a href="http://localhost/u-m-s/reset-pass.php?email='.$email.' &token= '.$token.'">
                http://localhost/u-m-s/reset-pass.php?email='.$email.' &token= '.$token.'
            </a><br>Regards<br>SPARK!</h3>';

            $mail->send();
            echo $user->showMessage('success','We have sent you a password reset link to your email address');

        }
        catch(Exception $e){
            echo $user->showMessage('danger',$mail->ErrorInfo);

        }
    }
    else{
        echo $user->showMessage('info','This email address is not registered!');
    }
}

?>