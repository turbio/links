<?php
session_start();

include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();

$template->loggedIn = false;

if(isset($_SESSION['user']) && isset($_SESSION['id'])){
	$template->loggedIn = true;
}

//$template->linkQuery = $linkQuery;

// Now that we figured out what data we want lets use a template
// to format the data......
// This file can be found in the templates directory.
$template->render('index.php');
