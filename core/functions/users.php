<?php

$conn = mysqli_connect('localhost','root','','worldview');

function user_id_from_username($username){
	global $conn;
	$username = sanitize($username);
	$query = mysqli_query($conn,"select id from users where username = '$username'");
	if($row = mysqli_fetch_assoc($query)){
		$id = $row['id'];
	}
	return $id;
}

function login($username,$password){
	global $conn;
	$id = user_id_from_username($username);
	$username = sanitize($username);
	$password = md5($password);
	$num = 0;
	$query = mysqli_query($conn,"select count(id) as num from users where username = '$username' and password = '$password'");
	if($row = mysqli_fetch_assoc($query)){
		$num = $row['num'];
	}
	return ($num) ? $id:false;
}

function user_active($username){
	global $conn;
	$query = mysqli_query($conn,"select active from users where username = '$username'");
	if($row = mysqli_fetch_assoc($query)){
		return $row['active'];
	} else{
		return 0;
	}
}

function user_exists($username){
	global $conn;
	$num = 0;
	$username = sanitize($username);
	$query = mysqli_query($conn,"select count(id) as num from users where username = '$username'");
	if($row = mysqli_fetch_assoc($query)){
		$num = $row['num'];
	}
	return ($num) ? true:false;
}

function logged_in(){
	return (isset($_SESSION['id'])) ? true:false;
}

function user_data($id){
	global $conn;
	$query = mysqli_query($conn,"select * from users where id = $id");
	
	if($row = mysqli_fetch_assoc($query)){
		return $row;
	} else {
		return 0;
	}
}

?>