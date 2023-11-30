<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "ESpace";
$connection = mysqli($server, $user, $password, $database);

//Create cart database
$quary = "CREATE TABLE CART
(email varchar(50) primary key,
itemImage varchar(100) not null,
itemName varchar(100) not null,
itemQuantity int default 0,
itemWanted in default 0,
itemPrice int default 0,
";


?>