<?php
session_start();

include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();

$requestString = 'SELECT name FROM link_category';

$linkQuery = $database->query($requestString);
$template->linkQuery = $linkQuery;

$template->render('categories.php');
