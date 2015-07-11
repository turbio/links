<!DOCTYPE html>
<?php
//if(!empty($_GET["search"])){
	//echo $_GET["search"];
//}

echo "<table width='100%'>";
echo "<tr id='title_row'>";
	//<td>id</td>
echo "<td><a href='index.php?order=0'>url</a></td>
	<td><a href='index.php?order=1'>description</a></td>
	<td><a href='index.php?order=2'>category</a></td>
	<td><a href='index.php?order=3'>creator</a></td>
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
	echo "<td><a href='" . $row[1] . "'>". $row[1] . "</a></td>";
	echo "<td>" . $row[2]. "</td>";
	echo "<td><a href='index.php?cat=".$row[3]."'>" . $row[3]. "</a></td>";
	echo "<td><a href='index.php?user=".$row[4]."'>" . $row[4]. "</a></td>";
	echo "</tr>";
	$shade = !$shade;
}
if($index <= 0){
	echo '<tr><td>no results found</td></tr>';
}
echo "</table>";
echo '</div>';

?>
