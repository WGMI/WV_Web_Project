<?php 

include 'core/init.php';

if(isset($_SESSION['id'])){
	header('Location: index.php');
}

include 'pages/includes/header.php';

if(!empty($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) || empty($password)){
		//errors[] variable is declared in init.php
		$errors[] = 'Please enter both the username and the password. <a href="login.html">Try again</a>';
	} else if(!user_exists($username)){
		$errors[] = 'That username does not exist. Have you been registered? <a href="login.html">Try again</a>';
	} else if(!user_active($username)){
		$errors[] = 'Your account is not active. Please contact your administrator. <a href="login.html">Try again</a>';
	} else{
		//Login function is located in core/functions/users.php
		$login = login($username,$password);
		if(!$login){
			$errors[] = 'That username/password combination is incorrect <a href="login.html">Try again</a>';
		} else{
			$_SESSION['id'] = $login;
			header('Location: index.php');//Once logged in, the user is redirected away
			exit();
		}
	}
}

if(!empty($errors)){
	echo output_errors($errors);
}

include 'pages/includes/footer.php';

?>	