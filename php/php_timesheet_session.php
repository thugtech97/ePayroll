<?php

session_start();

$emp_name = $_POST["emp_name"];
$tut = $_POST["tut"];
$tutdec = $_POST["tutdec"];
$totdec = $_POST["totdec"];
$tbody = $_POST["tbody"];
$tfoot = $_POST["tfoot"];

if(isset($_SESSION[$emp_name])){
	$_SESSION[$emp_name]["undertime"] = $tutdec;
	$_SESSION[$emp_name]["overtime"] = $totdec;
	$_SESSION[$emp_name]["tsb"] = $tbody;
	$_SESSION[$emp_name]["tsf"] = $tfoot;
	echo "1";
}

?>