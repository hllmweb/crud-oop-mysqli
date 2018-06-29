<?php 
	session_start();
	
	if(isset($_SESSION["email"]) && isset($_SESSION["senha"])):
		session_destroy();
	
		unset($_SESSION["email"],$_SESSION["senha"]);
		

		header("Location: login.php");
	endif;
?>