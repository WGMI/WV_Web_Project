<?php 

include 'core/init.php';
include 'includes/header.php';

if(!empty($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) || empty($password)){
		$errors[] = 'Please enter both the username and the password';
	} else if(!user_exists($username)){
		$errors[] = 'That username does not exist. Have you registered?';
	} else if(!user_active($username)){
		$errors[] = 'Your account is not active. Please contact your administrator.';
	} else{
		$login = login($username,$password);
		if(!$login){
			$errors[] = 'That username/password combination is incorrect';
		} else{
			$_SESSION['id'] = $login;
			header('Location: index.php');
			exit();
		}
	}
}

if(!empty($errors)){
	echo output_errors($errors);
}

include 'includes/footer.php';

?>	