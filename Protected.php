<?php
	session_start();

	if(!isset($_SESSION['logged_in']))
	{
		header("Location: Lab8-Template.php");
		die();
	}
?>

You have accessed the protected page!