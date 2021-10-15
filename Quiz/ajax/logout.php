<?php

	session_start();

	$_SESSION = array();

	// Finally, destroy the session.
	session_destroy();
	// header("location:index.php");
    echo 0;
?>