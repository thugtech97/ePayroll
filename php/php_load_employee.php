<?php

require "php_conn.php";
session_start();

$emp = "";

$action = $_POST["action"];
$sql = mysqli_query($conn, "SELECT DISTINCT name FROM tbl_logs");
$rows = mysqli_num_rows($sql);
if($rows!=0){
	while($row = mysqli_fetch_array($sql)){
		if(!isset($_SESSION[$row["name"]])) {
			$_SESSION[$row["name"]] = array("full_name"=>"", "no"=>"", "rate"=>"", "days_present"=>"", "undertime"=>"", "overtime"=>"", "basic_pay"=>"", "amount"=>"", "amount_ot"=>"", "gp"=>"", "sss"=>"", "philhealth"=>"", "pag_ibig"=>"", "np"=>"", "hdmf_loan"=>"", "tax"=>"", "sss_loan"=>"", "mf_cont"=>"", "mf_loan"=>"", "ca"=>"", "td"=>"", "nd"=>"", "tsb"=>"", "tsf"=>"");
		}
		if($action=='Timesheet'){
			$emp.="<a id=\"".$row["name"]."\" onclick=\"load_dtr(this.id);\" class=\"list-group-item names\">".$row["name"]."</a>";
		}else if($action=='Payroll'){
			$emp.="<a id=\"".$row["name"]."\" onclick=\"load_payroll(this.id);\" class=\"list-group-item names\">".$row["name"]."</a>";
		}else{
			$emp.="<a id=\"".$row["name"]."\" onclick=\"load_payslip(this.id);\" class=\"list-group-item names\">".$row["name"]."</a>";
		}		
	}
		
}else{
	
}

echo json_encode(array("emp"=>$emp, "num"=>$rows));

?>