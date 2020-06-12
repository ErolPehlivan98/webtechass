<?php

//get connection
$conn=new PDO("mysql:host=localhost;dbname=money", "root");
$money = $_POST["field2"];
$user = $_POST["user"];
$date = $_POST["date"];

if(!$conn){
  die("Connection failed: " . $conn->error);
}
$sql ="INSERT INTO money (username,monseyspent,dateentered) VALUES ('$user','$money','$date')";

$conn->query($sql);

header("Location:index.php");
?>
