<?php

session_start();

$emp_name = $_POST["emp_name"];
$days_present = $_POST["days_present"];
$basic_pay = $_POST["basic_pay"];
$amount = $_POST["amount"];
$amount_ot = $_POST["amount_ot"];
$sss = $_POST["sss"];
$philhealth = $_POST["philhealth"];
$pag_ibig = $_POST["pag_ibig"];
$np = $_POST["np"];
$hdmf_loan = $_POST["hdmf_loan"];
$gp = $_POST["gp"];
$tax = $_POST["tax"];
$sss_loan = $_POST["sss_loan"];
$mf_cont = $_POST["mf_cont"];
$mf_loan = $_POST["mf_loan"];
$ca = $_POST["ca"];
$td = $_POST["td"];
$nd = $_POST["nd"];

if(isset($_SESSION[$emp_name])){
	$_SESSION[$emp_name]["days_present"] = $days_present;
	$_SESSION[$emp_name]["basic_pay"] = $basic_pay;
	$_SESSION[$emp_name]["amount"] = $amount;
	$_SESSION[$emp_name]["amount_ot"] = $amount_ot;
	$_SESSION[$emp_name]["hdmf_loan"] = $hdmf_loan;
	$_SESSION[$emp_name]["gp"] = $gp;
	$_SESSION[$emp_name]["tax"] = $tax;
	$_SESSION[$emp_name]["sss_loan"] = $sss_loan;
	$_SESSION[$emp_name]["mf_cont"] = $mf_cont;
	$_SESSION[$emp_name]["mf_loan"] = $mf_loan;
	$_SESSION[$emp_name]["ca"] = $ca;
	$_SESSION[$emp_name]["td"] = $td;
	$_SESSION[$emp_name]["nd"] = $nd;
	$_SESSION[$emp_name]["np"] = $np;
	$_SESSION[$emp_name]["sss"] = $sss;
	$_SESSION[$emp_name]["philhealth"] = $philhealth;
	$_SESSION[$emp_name]["pag_ibig"] = $pag_ibig;
	
}

?>