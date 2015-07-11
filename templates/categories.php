<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="search.js"></script>
</head>
<body>

<?php
include 'top_bar.php';

echo '<div id="link_table">';
echo "<table width='100%'>";
echo "<tr id='title_row'>";
	//<td>id</td>
echo "
	<td><a href='categories.php?order=cat'>category</a></td>
	<td><a href='categories.php?order=num'>items</a></td>
</tr>";
$shade = true;
$index = 0;
while($row = $this->linkQuery->fetch()){
	$index++;
	if($shade){
		echo '<tr id="shaded_row" class="data_row">';
	}else{
		echo '<tr class="data_row">';
	}
	echo "<td><a href=index.php?cat=".$row[0].">". $row[0] . "</a></td>";
	echo "<td>" . "TODO". "</td>";
	//echo "<td><a href='index.php?cat=".$row[3]."'>" . $row[3]. "</a></td>";
	//echo "<td><a href='index.php?user=".$row[4]."'>" . $row[4]. "</a></td>";
	echo "</tr>";
	$shade = !$shade;
}
if($index <= 0){
	echo '<tr><td>no results found</td></tr>';
}
echo "</table>";
echo '</div>';
echo '</div>';

?>

</body>
</html>
