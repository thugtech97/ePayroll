<?php

require "php_conn.php";

$emp_no = $_POST["emp_no"];
$sick_leave = $_POST["sick_leave"];
$vacation_leave = $_POST["vacation_leave"];

$sql = mysqli_query($conn, "UPDATE tbl_leave_credits SET sick_leave = '$sick_leave', vacation_leave = '$vacation_leave' WHERE no = '$emp_no'");

?>