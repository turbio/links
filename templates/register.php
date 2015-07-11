<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include 'top_bar.php';

if($this->registered){
	header("Location: index.php");
	return;
}

if($this->loggedIn){
	header('Location: index.php');
	return;
}


echo '<div class="dialog">';
echo '<div class="dialog_title">register</div>';
echo '<hr/>';
echo '<div class="dialog_pad">';
if($this->error){
	echo '<div id="fail_box">' . $this->errorMessage . '.</div>';
}
echo '<form action="register.php" method="POST">
		<div>user name:</div>
		<input type="text" name="nick">
		<div>password:</div>
		<input type="password" name="password">
		<br/>
		<input type="submit" value="register" style="float:right;">
	</form>
	<br/>';
echo '</div>';
echo '</div>';
?>

</body>
</html>
