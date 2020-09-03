<?php

require "php_conn.php";
$sql = mysqli_query($conn, "SELECT * FROM tbl_logs");

if(mysqli_num_rows($sql)!=0){
	mysqli_query($conn, "DELETE FROM tbl_logs");
	echo "1";
}else{
	echo "0";
}

?>