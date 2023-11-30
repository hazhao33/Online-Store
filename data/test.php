<?php
$server = "localhost";
$user = "root";
$password = "Student123!";
$database = "Espace";

$connection = new mysqli($server,$user,$password,$database);
if($connection){
    echo "<script>console.log('login successful')</script>";
}
else{
    echo "<script>console.log('login fail <br>')</script>";
}

/** insert pre-set user data */
$query = "INSERT INTO USER (firstname, lastname, email, password)
VALUES 
('host','local', 'junkccccc@gmail.com','aa'),
('Tom','Hormes', 'tom@gmail.com',12422),
('Sam','KIT', 'sam@gmail.com',2133333),
('dick','rty', 'dick@gmail.com',111111),
('sa','sgg', 'sadasd@gmail.com','asdd')
";
$result = $connection->query($query);
if($result){
    echo "<script>console.log('User info is inserted')</script>";
    echo "<script>console.log($result)</script>";
}
else{
    echo "<script>console.log('fail to insert')</script>";
}

/** insert pre-set address data */
$query = "INSERT INTO USERADDRESS (fullname, userid, address, city, state,zip, country)
VALUES 
('local host',1, '1600 Holloway Ave','San Francisco','CA',94132, 'United States')
";
$result = $connection->query($query);
if($result){
    echo "<script>console.log('User address is inserted')</script>";
    echo "<script>console.log($result)</script>";
}
else{
    echo "<script>console.log('fail to insert')</script>";
}

$query = "SELECT userid, firstname, lastname, email, password FROM USER";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row['userid']. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " -------- ".$row["email"]." -------- ".$row["password"]."<br>";
    }
  } else {
    echo "0 results";
}
$connection->close();

?>