<?php
$serverName="localhost";
$userName="root";
$password="";
$con=mysqli_connect($serverName,$userName,$password);
if($con){
    echo "connection successful";
}
else{
    echo "connection failed";
}
$dbname="voting";
//check if database exists
$sql="SHOW DATABASES LIKE '$dbname'";
$result=$con->query($sql);
if($result->num_rows==0){
$sql="CREATE DATABASE voting";
mysqli_query($con,$sql);
$database="voting";
$con=mysqli_connect($serverName,$userName,$password,$database);
if(!$con){
    echo "Could not connect!";
}
else
{
    echo " Connected Successfully!!<br>";
}
 //creating table
 $sql1="CREATE TABLE User
 (
    Id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name varchar(30),
    Mobile bigint(10),
    Password varchar(5) NOT NULL,
    Address varchar(50),
    Photo BLOB,
    Role int(1),
    Status int(1),
    Vote int(100)
 )";
 if($con->query($sql1)==TRUE)
{
    echo "Table created successfully";
}
else{
    echo "Error creating table: " . $con->error;
}
}
?>