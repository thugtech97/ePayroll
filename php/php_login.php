<?php

require "php_conn.php";

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$res = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username LIKE '$username' AND password LIKE '$password'");

if(mysqli_num_rows($res)!=0){
	$row = mysqli_fetch_array($res);
	$_SESSION["id"] = $row["id"];
	$_SESSION["from"] = "MM-DD-YYYY";
	$_SESSION["to"] = "MM-DD-YYYY";
	$_SESSION["paydate"] = "MM-DD-YYYY";
	$_SESSION["on_off"] = false;
	echo "1";
}else{
	echo "0";
}

?>