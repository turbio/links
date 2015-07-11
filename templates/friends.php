<!DOCTYPE html>
<html>
<body BGCOLOR="#FFFFCC">

<?php

if(!$this->userGiven){
	echo "<h1>a user must be given</h1>";
	return;
}

$userInfo = $this->userQuery->fetch();

echo "<h1>friends of " . $userInfo[1] . " " . $userInfo[2] . ":</h1>";

//echo "<h1>friends of " . $_GET['user'] . "</h1>";
//echo "<a href='.'>back</a>"; 

// The fetch() function is called until there are no more rows
	//print_r( $row );

echo '<table width="400" border="1">';
while($row = $this->friendQuery->fetch()){
	echo "<tr><td>" . $row[0] . "</td>";
	echo "<td><a href='friends.php?user=" . $row[8] . "'>". $row[5] . "</a></td>";
	echo "<td>" . $row[6]. "</td>";
	echo "</tr>";

	//print_r( $row );
	//echo "<P>" . $row[0];
	//echo " - " . $row[5];
	//echo "......... " . $row[6];
}
echo "</table>";

echo '<a href="index.php"><- back</a>';

?>
</body>
</html>
