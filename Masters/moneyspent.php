<?php

//get connection
$conn=new PDO("mysql:host=localhost;dbname=web", "root");
$money = $_POST["field2"];
$user = $_POST["user"];
$date = $_POST["date"];

if(!$conn){
  die("Connection failed: " . $conn->error);
}
$sql ="INSERT INTO money (username,moneyspent,dateentered) VALUES ('$user','$money','$date')";

$conn->query($sql);

header("Location:index.php");
?>
