<?php

require "php_conn.php";

session_start();

$contents = $_POST["contents"];
$paydate = $_SESSION["paydate"];

if($paydate != "MM-DD-YYYY"){
	$sql = mysqli_query($conn, "SELECT pay_date FROM tbl_history WHERE pay_date LIKE '$paydate'");
	$paycoverage = $_SESSION["from"]." - ".$_SESSION["to"];
	$date_added = date("Y-m-d H:i:s");
	if(mysqli_num_rows($sql)==0){
		mysqli_query($conn, "INSERT INTO tbl_history(pay_date, payroll_content, pay_coverage, date_added) VALUES('$paydate', '$contents', '$paycoverage', '$date_added')");
		echo "1";
	}else{
		mysqli_query($conn, "UPDATE tbl_history SET pay_date='$paydate', payroll_content='$contents', pay_coverage='$paycoverage' WHERE pay_date LIKE '$paydate'");
		echo "2";
	}
}else{
	echo "0";
}

?>