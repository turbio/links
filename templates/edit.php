<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include 'top_bar.php';

echo '<div id="link_table">';
echo "<table width='100%'>";
echo "<tr id='title_row'>
	<td>id</td>
	<td>url</td>
	<td>description</td>
	<td>category</td>
	<td colspan = '2'>creator</td>
</tr>";
echo "<form action='edit.php' method='get'>
	<input type='hidden' name='add' value='1'>
	<td>#</td>
	<td><input type='text' name='url' placeholder='url'></td>
	<td><input type='text' name='desc' placeholder='description'></td>
	<td><input type='text' name='cat' placeholder='category'></td>
	<td>" . $_SESSION['user'] . "</td>
	<td><input type='submit' value='add'></td>
	</form>";
$shade = true;
while($row = $this->linkQuery->fetch()){
	if($shade){
		echo '<tr id="shaded_row">';
	}else{
		echo "<tr>";
	}

	if(!empty($_GET['edit']) && empty($_GET['sub']) && ($_GET['edit'] == $row[0])){
		echo "<form action='edit.php' method='get'>
			<input type='hidden' name='edit' value='".$row[0]."'>
			<input type='hidden' name='sub' value='1'>
			<td>".$row[0]."</td>
			<td><input type='text' name='url' placeholder='url' value='".$row[1]."'></td>
			<td><input type='text' name='desc' placeholder='description'  value='".$row[2]."'></td>
			<td><input type='text' name='cat' placeholder='category' value='".$row[3]."'></td>
			<td>" . $_SESSION['user'] . "</td>
			<td><input type='submit' value='done'> <a href='edit.php'>cancel</a></td>
			</form>";
	}else{
		echo "<td>" . $row[0] . "</td>";
		echo "<td><a href='" . $row[1] . "'>". $row[1] . "</a></td>";
		echo "<td>" . $row[2]. "</td>";
		echo "<td>" . $row[3]. "</td>";
		echo "<td>" . $row[4]. "</td>";
		echo "<td><a href='edit.php?edit=" . $row[0] . "'>edit</a>
			<a href='edit.php?remove=" . $row[0] . "'>remove</a></td>";
		echo "</tr>";
	}

	$shade = !$shade;
}
echo "</table>";
echo '</div>';

?>

</body>
</html>
