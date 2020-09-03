<?php

require "php_conn.php";

$sql = mysqli_query($conn, "SELECT * FROM tbl_logs");

if(mysqli_num_rows($sql)!=0){
	echo "1";
}else{
	echo "0";
}

?>