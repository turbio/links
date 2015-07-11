<?php
include_once('View.php');
include_once('DB.php');

$template = new View();
$database = new DB();

$requestString = 'SELECT links.id,links.url,links.description,link_category.name,link_uesrs.nick
		FROM links
			JOIN link_category ON links.category = link_category.id
			JOIN link_uesrs ON links.creator_id = link_uesrs.id';

if(!empty($_GET['cat'])){
	$requestString .= ' WHERE link_category.name = "'.$_GET['cat'].'"';
	if(!empty($_GET['user'])){
		$requestString .= ' AND link_uesrs.nick = "'.$_GET['user'].'"';
	}

}else if(!empty($_GET['user'])){
	$requestString .= ' WHERE link_uesrs.nick = "'.$_GET['user'].'"';
}

if(!empty($_GET['order'])){
	$orderColumn = '';

	switch(intval($_GET['order'])){
		case 0:
			$orderColumn = 'links.url';
			break;
		case 1:
			$orderColumn = 'links.description';
			break;
		case 2:
			$orderColumn = 'link_category.name';
			break;
		case 3:
			$orderColumn = 'link_uesrs.nick';
			break;
		default:
			break;
	}

	$requestString .= ' ORDER BY ' . $orderColumn;
}

if(!empty($_GET["search"])){
	$requestString = 'SELECT links.id,links.url,links.description,link_category.name,link_uesrs.nick
		FROM links
			JOIN link_category ON links.category = link_category.id
			JOIN link_uesrs ON links.creator_id = link_uesrs.id
		WHERE links.description LIKE "%'.$_GET["search"].'%"
			OR links.url LIKE "%'.$_GET["search"].'%"';
}
$linkQuery = $database->query($requestString);

$template->linkQuery = $linkQuery;

// Now that we figured out what data we want lets use a template
// to format the data......
// This file can be found in the templates directory.
$template->render('link_table.php');
?>
