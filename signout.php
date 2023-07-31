<?php

if(isset($_POST["signout"]))
{
	session_start();
	session_unset();
	session_destroy();
	header('location:lms.php');
	exit();
}


?>