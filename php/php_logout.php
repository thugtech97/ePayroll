<?php
	session_start();
	session_unset();
	session_destroy();
	echo "<script> document.location = '../pages/index.php'; </script>";
?>