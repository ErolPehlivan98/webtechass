<?php

session_start();


$username = $_POST["username"];
$password = $_POST["pass"];

$conn=new PDO("mysql:host=localhost;dbname=web", "root");


$result=$conn->query("SELECT * FROM login WHERE username='$username' AND password='$password'");
$row=$result->fetch();
if($row==false)
{
	echo "Incorrect username/password!";

}
else
{

	header("Location: index.php");
	$_SESSION["login_key"] = "$username";
}
?>
