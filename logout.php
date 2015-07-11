<?php
session_start();
$_SESSION['user'] = null;
$_SESSION['id'] = null;
session_destroy();
header("Location: index.php");
