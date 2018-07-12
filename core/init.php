<?php

session_start();

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

if(logged_in()){
	$session = $_SESSION['id'];
	$user_data = user_data($session);
}

$errors = array();

?>