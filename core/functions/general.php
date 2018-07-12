<?php 

$conn = mysqli_connect('localhost','root','','worldview');

function protect(){
	if(!isset($_SESSION['id'])){
		header('Location: login.html');
	}
}

function sanitize($data){
	global $conn;
	return mysqli_real_escape_string($conn,$data);
}

function output_errors($errors){
	return '<ul><li>'.implode('</li><li>',$errors).'</li></ul>';
}

?>	