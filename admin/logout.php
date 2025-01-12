<?php
	//echo "Alright";
	session_start();
	
	$username=$_SESSION['username'];
	//echo $username;
	session_destroy();
	header("Location:index.php");
?>