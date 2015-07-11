<div id="bgTopColor"></div>
<div id="bgTitleColor"></div>

<div id="top_bar">
<div class="bar_buttons_nohl"><input onKeyDown="searchChange()" onchange="searchChange()" id="search" type="text" placeholder="search"></div>
<div class="bar_buttons"><a href="index.php">home</a></div>
<div class="bar_buttons"><a href="categories.php?cat=list">categories</a></div>

<?php
if(isset($_SESSION['user']) && isset($_SESSION['id'])){
	echo '<div id="user_button"><a href="logout.php">logout</a></div>';
	echo '<div id="user_button"><a href="user.php">welcome, ';
	echo $_SESSION['user'];
	echo '</a></div>';
	echo '<div class="bar_buttons"><a href="edit.php">edit</a></div>';
}else{
	echo '<div id="user_button">';
	echo '<a href="login.php">login</a>';
	echo '</div>';
	echo '<div id="user_button">';
	echo '<a href="register.php">register</a>';
	echo '</div>';
}

?>

</div>
