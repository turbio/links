<?php
session_start();

include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();

function getCategoryId($catName){
	$catName = strtolower($catName);
	global $database;

	$checkCategoryQuery = $database->query(
		'SELECT id,name FROM link_category WHERE name = "'.$catName.'"');

	$catRequest = $checkCategoryQuery->fetch();
	if($catRequest){
		return $catRequest['id'];
	}else{
		$addCategoryRequest = $database->query(
			'INSERT INTO link_category (name) VALUES ("'.$catName.'")');

		return getCategoryId($catName);
	}
}

$template->loggedIn = false;

if(isset($_SESSION['user']) && isset($_SESSION['id'])){
	$template->loggedIn = true;
}

if(!empty($_GET['remove'])){
	$removeLinkQuery = $database->query(
		'DELETE FROM links WHERE id = "' . $_GET['remove'] . '"');
}

if(!empty($_GET['url'])
&& !empty($_GET['desc'])
&& !empty($_GET['cat'])
&& !empty($_GET['add'])
&& ($_GET['add'] == "1")){

	//$url = parse_url($_GET['url']);

	$addLinkQuery = $database->query(
		'INSERT INTO links (creator_id,url,category,description,protocol,subdomain)
		VALUES ("'
		. $_SESSION['id'] . '","'
		. $_GET['url'] . '","'
		. getCategoryId($_GET['cat']) . '","'
		. $_GET['desc'] . '","'
		. 'TODO' . '","'
		. 'TODO'
		. '")');
}

if(!empty($_GET['url'])
	&& !empty($_GET['desc'])
	&& !empty($_GET['cat'])
	&& !empty($_GET['edit'])
	&& !empty($_GET['sub'])){
	$addLinkQuery = $database->query(
		'UPDATE links
		SET creator_id="'.$_SESSION['id'].'",url="'.$_GET['url'].'",category="'.getCategoryId($_GET['cat']).'",description="'.$_GET['desc'].'"
		WHERE id= "'.$_GET['edit'].'"');
}

$linkQuery = $database->query(
	'SELECT links.id,links.url,links.description,link_category.name,link_uesrs.nick
	FROM links
	JOIN link_category ON links.category = link_category.id
	JOIN link_uesrs ON links.creator_id = link_uesrs.id');

$template->linkQuery = $linkQuery;

$template->render('edit.php');
