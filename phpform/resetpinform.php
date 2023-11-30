<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);

if (isset($_POST["reset"])) {

    $userid = $_COOKIE['userid'];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if($password1 != $password2){
        echo '
        <h2>Reset password</h2><br>
        <div><input type="password" name="password1" placeholder="Enter password" required /></div>
        <div class="needcheck"><input type="password" name="password2" placeholder="Confirm password" required /><span class="warning">* do not match</span></div>
        <input type="submit" name="reset" value="Reset" class="loginSubmitButton">
        <br><p id="signupmsg">New to ESpace? <a href="../storefront/signup.php" class="anchor">Sign up!</a></p>
        ';
    
    }
    else{
        $query = "UPDATE USER SET password = '".$password1."' WHERE userid = " . $userid;
        $result = $connection->query($query);

        $query = "SELECT firstname, userid FROM USER WHERE email='".$_POST['email1']."'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        $cname = "username";
        $cvalue = $row['firstname'];
        setcookie($cname, $cvalue, time() + (96400 * 30), "/");
        $cname = "userid";
        $cvalue = $row['userid'];
        setcookie($cname, $cvalue, time() + (96400 * 1), "/");


        echo '<h2>Password reset succeed</h2>Will return in 3s <script>waitPreviousPage();</script>';
        /*$query = "SELECT password FROM USER WHERE userid='".$userid."'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();
        echo '<br>'.$row['password'];*/
    }

} else {
    echo '
    <h2>Reset password</h2><br>
    <div><input type="password" name="password1" placeholder="Enter password" required /></div>
    <div><input type="password" name="password2" placeholder="Confirm password" required /></div>
    <input type="submit" name="reset" value="Reset" class="loginSubmitButton">
    <br><p id="signupmsg">New to ESpace? <a href="../storefront/signup.php" class="anchor">Sign up!</a></p>
    ';

}
$connection->close();
