<?php
session_start();
session_destroy(); // destroy session
header("location:admin_login.php");
//echo $_SESSION['login'];
?>
