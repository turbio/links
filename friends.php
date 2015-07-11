<?php

include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();


if(empty($_GET['user'])){
	$template->userGiven = false;
	$template->render('friends.php');
	return;
}

$userId = $_GET['user'];

$template->userGiven = true;

$template->userQuery =
	$database->query('SELECT * FROM user WHERE profile_id = "' . $userId . '"');

$friendQuery = $database->query('SELECT * FROM friends JOIN user ON profile_id = friend1 OR profile_id = friend2 WHERE (friend1 = ' . $userId . ' OR friend2 = ' . $userId . ') AND profile_id != ' . $userId);

$template->friendQuery = $friendQuery;

// Now that we figured out what data we want lets use a template
// to format the data......
// This file can be found in the templates directory.
$template->render('friends.php');
