<?php
session_start();

include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();

$template->loggedIn = false;
$template->loginAttempt = false;
$template->correctCred = false;

if(!isset($_SESSION['user']) || !isset($_SESSION['id'])){
	if(!empty($_POST["nick"]) && !empty($_POST["password"])){
		$template->loginAttempt = true;

		$userQuery = $database->query(
			'SELECT * FROM link_uesrs WHERE nick = "'. $_POST["nick"] . '";');
		$userInfo = $userQuery->fetch();

		if(!empty($userInfo["pass"]) && !empty($userInfo["salt"]) && !empty($userInfo["id"])){
			$rehashedPass = hash("sha256", $_POST["password"] . $userInfo["salt"]);

			if($userInfo["pass"] == $rehashedPass){
				$template->correctCred = true;
				$template->loggedIn = true;
				$_SESSION['user'] = $_POST["nick"];
				$_SESSION['id'] = $userInfo["id"];
			}

		}else{
			$template->correctCred = false;
		}
	}
}else{
	$template->loggedIn = true;
}

$template->render('login.php');
