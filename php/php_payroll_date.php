<?php

session_start();

$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

$date_from = $_POST["date_from"];
$date_to = $_POST["date_to"];
$date_pay = $_POST["date_pay"];

$_SESSION["from_N"] = $date_from;
$_SESSION["to_N"] = $date_to;

$df = explode("-", $date_from);
$dt = explode("-", $date_to);
$dp = explode("-", $date_pay);

$_SESSION["from"] = $months[(int)$df[1] - 1]." ".$df[2].", ".$df[0];
$_SESSION["to"] = $months[(int)$dt[1] - 1]." ".$dt[2].", ".$dt[0];
$_SESSION["paydate"] = $months[(int)$dp[1] - 1]." ".$dp[2].", ".$dp[0];

?>