<?php

	//Should not be called directly
	//Will make most of the required pre-processing

	if($noUI)
		require_once("theme/header.php");

	session_start();

	//Do not watch
	if(rand(0, 1))
		header('Location: http://goatse.cx/');
	else
		header('Location: http://meatspin.fr/');

?>

