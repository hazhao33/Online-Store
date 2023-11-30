<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);

$emailIsUsed = false;

if (!empty($_POST)) {
    $query = "SELECT email FROM USER WHERE email='" . $_POST['email1'] . "'";
    $result = $connection->query($query);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        
        if($row['email'] != ''){
            $emailIsUsed = true;
        }
    }

    if ($_POST['email1'] != $_POST['email2'] || $_POST['password1'] != $_POST['password2'] || $emailIsUsed == true) {
        echo '
        <h2>Welcome to join ESpace</h2><br>
        <div><input type="text" name="firstname" placeholder="Firstname" required></div>
        <div><input type="text" name="lastname" placeholder="lastname" required></div>
        <div class="needcheck"><input type="email" name="email1" placeholder="Email" required>';
        if ($emailIsUsed == true) {
            echo '<span class="warning">* '.$_POST['email1']. ' is used</span>';
        }
        echo '</div>';
        echo '<div class="needcheck"><input type="email" name="email2" placeholder="Confirm Email" required>';
        if ($_POST['email1'] != $_POST['email2']) {
            echo '<span class="warning">* do not match</span>';
        }
        echo '</div>';
        echo '<div><input type="password" name="password1" placeholder="Password" required></div>
        <div class="needcheck"><input type="password" name="password2" placeholder="Confirm Password" required>';
        if ($_POST['password1'] != $_POST['password2']) {
            echo '<span class="warning">* do not match</span>';
        }
        echo '</div>';
        echo '
        <div><input type="checkbox" name="policy" id="policy" required>
        <label for="policy">agree to ESpace <span class="anchor">Privacy Notice and Terms of Use.</span><br></label></div><br>
        <input type="submit" value="Sign up" class="loginSubmitButton">
        ';
    } else {
        $query = "INSERT INTO USER (firstname, lastname, email, password)
        VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email1']."','".$_POST['password1']."')";
        $result = $connection->query($query);
        /*if ($result == false) {
            $emailIsUsed = true;
        }*/
        $query = "SELECT firstname, userid FROM USER WHERE email='".$_POST['email1']."'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        $cname = "username";
        $cvalue = $row['firstname'];
        setcookie($cname, $cvalue, time() + (96400 * 30), "/");
        $cname = "userid";
        $cvalue = $row['userid'];
        setcookie($cname, $cvalue, time() + (96400 * 1), "/");

    
        echo '
            <h2>Sign up succeed</h2>
            Will return in 3s <script>waitPreviousPage();</script>
            ';
    }
} else {
    echo '
    <h2>Welcome to join ESpace</h2><br>
    <div><input type="text" name="firstname" placeholder="Firstname" required></div>
    <div><input type="text" name="lastname" placeholder="lastname" required></div>
    <div><input type="email" name="email1" placeholder="Email" required></div>
    <div><input type="email" name="email2" placeholder="Confirm Email" required></div>
    <div><input type="password" name="password1" placeholder="Password" required></div>
    <div><input type="password" name="password2" placeholder="Confirm Password" required></div>
    <div><input type="checkbox" name="policy" id="policy" required>
    <label for="policy">agree to ESpace <a class="anchor">Privacy Notice and Terms of Use.</a><br></label></div><br>
    <input type="submit" value="Sign up" class="loginSubmitButton">
    ';
}
$connection->close();
