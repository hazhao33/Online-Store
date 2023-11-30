<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);

if (!empty($_POST)) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($email != "") {
        $query = "SELECT firstname, password FROM USER WHERE email='" . $email . "'";
        $result = $connection->query($query);
        if ($result != false) {
            $row = $result->fetch_assoc();
        }
    }
    if ($row["password"] != $password) {
        echo '
        <h2>Log in</h2><br>
        <div><input type="email" name="email" placeholder="Email Address" required></div>
        <div class="needcheck"><input type="password" name="password" placeholder="Password" required><span class="warning">* do not match</span></div>
        
        <p><a href="../storefront/getcode.php" class="anchor">Forgot your password?</a></p>
        <input type="submit" value="Sign in" class="loginSubmitButton">
        <br><p id="signupmsg">New to ESpace? <a href="../storefront/signup.php" class="anchor">Sign up!</a></p>
        ';
    } else {
        $query = "SELECT firstname, userid FROM USER WHERE email='".$email."'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        $cname = "username";
        $cvalue = $row['firstname'];
        setcookie($cname, $cvalue, time() + (96400 * 30), "/");
        $cname = "userid";
        $cvalue = $row['userid'];
        setcookie($cname, $cvalue, time() + (96400 * 1), "/");

        echo '
        <h2>Login succeed</h2>
        Will return in 3s <script>waitPreviousPage();</script>
        ';
    }
} else {
    echo '
    <h2>Log in</h2><br>
    <div><input type="email" name="email" placeholder="Email Address" required></div>
    <div class="needcheck"><input type="password" name="password" placeholder="Password" required></div>
    <p><a href="../storefront/getcode.php" class="anchor">Forgot your password?</a></p>
    <input type="submit" value="Sign in" class="loginSubmitButton">
    <br><p id="signupmsg">New to ESpace? <a href="../storefront/signup.php" class="anchor">Sign up!</a></p>
    ';
}
$connection->close();
?>