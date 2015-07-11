<?php
session_start();

include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();

$template->loggedIn = false;
$template->registered = false;
$template->error = false;
$errorMessage = "";

function verifyNick($nick){
	global $database;
	global $errorMessage;

	if(!ctype_alnum($nick)){
		$errorMessage = "username must be alphanumeric";
		return false;
	}

	$userCheckQuery = $database->query('SELECT * FROM link_uesrs WHERE nick = "'.$nick.'"');
	if($userCheckQuery->fetch()){
		$errorMessage = "user already exists";
		return false;
	}

	return true;
}

if(!isset($_SESSION['user'])){
	if(!empty($_POST["nick"]) && !empty($_POST["password"])){
		$nickValidity = verifyNick($_POST["nick"]);
		if($nickValidity == true){
			$passSalt = md5(time());
			$hashedPass = hash("sha256", $_POST["password"] . $passSalt);

			$userAddQuery = $database->query(
				'INSERT INTO link_uesrs (nick,pass,salt)
				VALUES ("' . $_POST["nick"] . '","' . $hashedPass . '","' . $passSalt . '")');
			$template->registered = true;

			//$_SESSION['user'] = $_POST["nick"];
			//$_SESSION['id'] = ;
		}else{
			$template->error = true;
		}
	}
}else{
	$template->loggedIn = true;
}

$template->errorMessage = $errorMessage;

$template->render('register.php');
