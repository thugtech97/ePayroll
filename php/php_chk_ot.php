<?php

require "php_conn.php";

session_start();

$chk = $_POST["chk"];
$_SESSION["on_off"] = $chk;

if($chk == "true"){
	echo "1";
}else{
	echo "0";
}

?>