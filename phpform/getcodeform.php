<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if (isset($_POST["sendcode"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'junkccccc@gmail.com';
        $mail->Password = 'Kevmzchoek';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('junkccccc@gmail.com', 'ESpace.com');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
        $mail->send();
        // insert in verify table
        $query = "INSERT INTO VERIFY (email, verification_code, email_verified_at) VALUES ('" . $email .  "', '" . $verification_code . "', NULL)";
        $result = $connection->query($query);
        header("Location: /csc317-group-html-hazhao33/storefront/verifycode.php?email=" . $email);

        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    echo '
    <h2>Reset password</h2><br>
    <div><input type="email" name="email" placeholder="Email Address" required></div>
    <span>Please enter you email above</span><br><br>
    <input type="submit" value="Send code" name="sendcode" class="loginSubmitButton">
    <br><br><p id="signupmsg">New to ESpace? <a href="../storefront/signup.php" class="anchor">Sign up!</a></p>
    ';
}
$connection->close();
?>