<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "artikel";

$conn = new mysqli($hostname,$username,$password,$database);

if($conn -> connect_error){
	die("tidak terbaca".$conn -> connect_error);
}



?>