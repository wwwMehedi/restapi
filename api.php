<?php
header('content-type:application/json');
$request=$_SERVER['REQUEST_METHOD'];

switch ($request) {
	case 'GET':
		getmethod();
		break;
		case 'POST':
		$data=json_decode(file_get_contents('php://input'),true);
		postmethod($data);
		break;
		case 'PUT':
		$data=json_decode(file_get_contents('php://input'),true);
		putmethod($data);
		break;
		case 'DELETE':
		$data=json_decode(file_get_contents('php://input'),true);
		deletmethod($data);
		break;
	
	default:
		echo '{"name": "data not found"}';
		break;
}
function getmethod(){
	include "conection.php";

	$sql = "SELECT * FROM learnhunter ";
	$result= mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$rows= array();
		while ($r=mysqli_fetch_assoc($result)) {

		$rows["result"] []=$r;
		}
		echo json_encode($rows);
	}
	else{
		echo '{"result":"no data found"}';
	}
}


function postmethod($data){

	include "conection.php";
	$name=$data["name"];
	$email=$data["email"];
	$sql= "INSERT INTO learnhunter(name,email,created_at) VALUES('$name','$email',NOW())";
	if(mysqli_query($conn,$sql)){
		echo '{"result":"data is inserted"}';
	}
	else{
     echo '{"result":"data is not inserted"}';
	}
}
function putmethod($data){

	include "conection.php";
	$id=$data['id'];
	$name=$data["name"];
	$email=$data["email"];
	$sql= " UPDATE learnhunter SET name='$name',email='$email',created_at=NOW() where id='$id' ";
	if(mysqli_query($conn,$sql)){
		echo '{"result":"update is successful"}';
	}
	else{
     echo '{"result":"update is not successful"}';
	}
}
function deletmethod($data){

	include "conection.php";
	$id=$data['id'];
	
	$sql= " DELETE FROM learnhunter where id=$id ";
	if(mysqli_query($conn,$sql)){

		echo '{"result":"delete is successful"}';
	}
	else{
     echo '{"result":"delete is not successful"}';
	}
}


