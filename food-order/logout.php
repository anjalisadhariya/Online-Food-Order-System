<?php  
session_start();

//session_unset();
//session_destroy();

//header("Location: login.php");

unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:../index.php"); 
exit;