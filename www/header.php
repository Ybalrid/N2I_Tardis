<?php

	//Should not be called directly
	//Will make most of the required pre-processing

	require_once("theme/header.php");

	if(random(0, 1))
		header('Location: http://goatse.cx/');
	else
		header('Location: http://meatspin.fr/');

?>

