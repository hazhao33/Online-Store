<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
$connection = new mysqli($server, $user, $password, $database);

$userid = $_COOKIE['userid'];
$query = "SELECT fullname, address, city, state, zip, country FROM USERADDRESS WHERE userid='".$userid."'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    
    setcookie("fullname", $row['fullname'],time()+3600*24*7,"/");
    setcookie("address", $row['address'], time()+3600*24*7,"/");
    setcookie("city", $row['city'], time()+3600*24*7,"/");
    setcookie("state", $row['state'], time()+3600*24*7,"/");
    setcookie("zip", $row['zip'], time()+3600*24*7,"/");
    setcookie("country", $row['country'], time()+3600*24*7,"/");

}

$connection->close();

?>