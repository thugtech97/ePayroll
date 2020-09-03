<?php

session_start();

$emp_name = $_POST["emp_name"];

if(isset($_SESSION[$emp_name])){
	echo json_encode(array("full_name"=>$_SESSION[$emp_name]["full_name"], "no"=>$_SESSION[$emp_name]["no"], "rate"=>$_SESSION[$emp_name]["rate"], "days_present"=>$_SESSION[$emp_name]["days_present"], "undertime"=>$_SESSION[$emp_name]["undertime"],"overtime"=>$_SESSION[$emp_name]["overtime"],"hdmf_loan"=>$_SESSION[$emp_name]["hdmf_loan"],"tax"=>$_SESSION[$emp_name]["tax"],"sss_loan"=>$_SESSION[$emp_name]["sss_loan"],"mf_cont"=>$_SESSION[$emp_name]["mf_cont"],"mf_loan"=>$_SESSION[$emp_name]["mf_loan"],"ca"=>$_SESSION[$emp_name]["ca"],"td"=>$_SESSION[$emp_name]["td"],"nd"=>$_SESSION[$emp_name]["nd"],"np"=>$_SESSION[$emp_name]["np"],"sss"=>$_SESSION[$emp_name]["sss"],"philhealth"=>$_SESSION[$emp_name]["philhealth"],"pag_ibig"=>$_SESSION[$emp_name]["pag_ibig"]));
}

?>