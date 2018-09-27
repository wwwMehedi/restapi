<?php
$server="localhost";
$username="root";
$password="";
$dbname="demoapi";

//$conn = mysqli_connect($server, $username, $password,$dbname);
$conn= new mysqli($server, $username, $password,$dbname);

//if($conn->connect_error){
	//die("database failed" . $conn->connect_error);
//}
//echo "created successfull";





?>