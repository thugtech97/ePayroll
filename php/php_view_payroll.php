<?php

require "php_conn.php";

$num = $_POST["num"];

$sql = mysqli_query($conn, "SELECT payroll_content FROM tbl_history WHERE log_number = '$num'");

$row = mysqli_fetch_assoc($sql);

echo $row["payroll_content"];

?>