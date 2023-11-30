<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);

if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // mark email as verified
    $query = "UPDATE VERIFY SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result  = mysqli_query($connection, $query);

    if (mysqli_affected_rows($connection) == 0) {
        header("Location: /csc317-group-html-hazhao33/storefront/verifycode.php?email=" . $email);
    }
    else{
        $query = "SELECT firstname, userid FROM USER WHERE email='".$email."'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        $cname = "username";
        $cvalue = $row['firstname'];
        setcookie($cname, $cvalue, time() + (96400 * 30), "/");
        $cname = "userid";
        $cvalue = $row['userid'];
        setcookie($cname, $cvalue, time() + (96400 * 1), "/");

        header("Location: /csc317-group-html-hazhao33/storefront/resetpin.php");

    }
} else {
    echo '
    <h2>Verify code</h2><br>
    <input type="hidden" name="email" value="';
    echo $_GET['email'];
    echo '" required>
    <div class="needcheck"><input type="text" name="verification_code" placeholder="Enter verification code" required /></div>
    <input type="submit" name="verify_email" value="Verify Email" class="loginSubmitButton">
    <br><p id="signupmsg">New to ESpace? <a href="../storefront/signup.php" class="anchor">Sign up!</a></p>
    ';
}
$connection->close();
