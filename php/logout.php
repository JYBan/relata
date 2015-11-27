<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: http://team17.dothome.co.kr/main.html");
	die();
?>