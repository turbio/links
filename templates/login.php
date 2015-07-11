<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include 'top_bar.php';


if($this->correctCred){
	header("Location: index.php");
	return;
}

echo '<div class="dialog">';
echo '<div class="dialog_title">login</div>';
echo '<hr/>';
echo '<div class="dialog_pad">';
if($this->loginAttempt){
	echo '<div id="fail_box">your login credidentials were incorrect.</div>';
}

if($this->loggedIn){
	echo 'already logged as ' . $_SESSION['user'] . '!<br/><a href="index.php">home</a>';
}else{
	echo '<form action="login.php" method="POST">
			user name:
			<br/>
			<input type="text" name="nick">
			<br>
			password:
			<br/>
			<input type="password" name="password">
			<br/>
			<input type="submit" value="login">
		</form>';
}
echo '</div>';

?>

</body>
</html>
