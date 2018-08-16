<?php 

$conn = mysqli_connect('localhost','root','','worldview');//Connection variable


//Redirect to the login page if a user is not logged in
function protect(){
	if(!isset($_SESSION['id'])){
		header('Location: login.html');
	}
}

//Redirect to the index page if a user is not an administrator
function admin_only(){
	if(!isset($_SESSION['id'])){
		header('Location: index.php');
	} else {
		$user = user_data($_SESSION['id'],'type');
		if(!$user['type']){
			header('Location: index.php');
		}
	}
}

//Protect against SQL injection
function sanitize($data){
	global $conn;
	return mysqli_real_escape_string($conn,$data);
}

//Output an array of errors as an unordered list
function output_errors($errors){
	return '<ul><li>'.implode('</li><li>',$errors).'</li></ul>';
}

?>	