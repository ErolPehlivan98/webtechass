<?php
session_start();


$username = $_POST["username"];
$password = $_POST["pass"];


$conn=new PDO("mysql:host=localhost;dbname=web", "root");

$sql ="INSERT INTO login (username,password) VALUES ('$username','$password')";

$conn->query($sql);

header("Location: index.php");


 ?>
