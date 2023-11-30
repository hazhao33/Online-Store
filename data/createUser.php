<?php

$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";
/*reset database*/
$connection = new mysqli($server,$user,$password);
if($connection){
    echo "<script>console.log('login successful')</script>";
}
else{
    echo "<script>console.log('login fail')</script>";
}

$query = "DROP DATABASE IF EXISTS ".$database;
$result = $connection->query($query);
if($result){
    echo "<script>console.log('database is drop')</script>";
}
else{
    echo "<script>console.log('fail to drop database')</script>";
}

$query = "CREATE DATABASE ".$database;
$result = $connection->query($query);
if($result){
    echo "<script>console.log('Database is created')</script>";
}
else{
    echo "<script>console.log('$database exists')</script>";
}
$connection->close();

/**create tables */
$connection = new mysqli($server,$user,$password,$database);
if($connection){
    echo "<script>console.log('login successful')</script>";
}
else{
    echo "<script>console.log('login fail <br>')</script>";
}

//table: USER
$query = "CREATE TABLE IF NOT EXISTS USER(
    userid int AUTO_INCREMENT primary key,
    firstname varchar(50) not null,
    lastname varchar(50) not null,
    email text not null,
    phonenumber int,
    password varchar(16) not null,
    bdmonth int,
    bddate int,
    bdyear int
)";
$result = $connection->query($query);
if($result){
    echo "<script>console.log('TABLE: USER is created')</script>";
}
else{
    echo "<script>console.log('TABLE: USER fail to created')</script>";
}
//table: USERADDRESS
$query = "CREATE TABLE IF NOT EXISTS USERADDRESS(
    fullname varchar(50),
    userid int primary key,
    address varchar(50),
    city varchar(50),
    state char(2),
    zip int,
    country varchar(50)
)";
$result = $connection->query($query);
if($result){
    echo "<script>console.log('TABLE: USERADDRESS is created')</script>";
}
else{
    echo "<script>console.log('TABLE: USERADDRESS fail to created')</script>";
}

//table: ORDER
$query = "CREATE TABLE ORDERSADDRESS(
    orderid int AUTO_INCREMENT primary key,
    fullname varchar(50),
    userid int,
    address varchar(50),
    city varchar(50),
    state char(2),
    zip int,
    country varchar(50)
)";
$result = $connection->query($query);
if($result){
    echo "<script>console.log('TABLE: ORDERSADDRESS is created')</script>";
}
else{
    echo "<script>console.log('TABLE: ORDERSADDRESS fail to created')</script>";
}

$query = "CREATE TABLE ORDERS(
    orderid text,
    productid text,
    userid text,
    orderquantity text
)";
$result = $connection->query($query);
if($result){
    echo "<script>console.log('TABLE: ORDERS is created')</script>";
}
else{
    echo "<script>console.log('TABLE: ORDERS fail to created')</script>";
}


//table: VERITY
$query = "
CREATE TABLE `VERIFY` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `email` text NOT NULL,
    `verification_code` text NOT NULL,
    `email_verified_at` datetime DEFAULT NULL
  );
  ";
  $result = $connection->query($query);
  if($result){
    echo "<script>console.log('TABLE: verify is created')</script>";
}
else{
    echo "<script>console.log('TABLE: verify fail to created')</script>";
}



$connection->close();
?>