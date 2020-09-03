<?php

session_start();
require "php_conn.php";

$bp_total = 0.00;
$amt_total = 0.00;
$amt_ot_total = 0.00;
$gp_total = 0.00;
$ss_total = 0.00;
$philhealth_total = 0.00;
$pagibig_total = 0.00;
$tax_total = 0.00;
$np_total = 0.00;
$hdmf_total = 0.00;
$sss_total = 0.00;
$mfc_total = 0.00;
$mfl_total = 0.00;
$ca_total = 0.00;
$td_total = 0.00;
$nd_total = 0.00;

$tbody_rows = "";
$tfoot_rows = "";

$sql = mysqli_query($conn, "SELECT DISTINCT l.name, e.lname FROM tbl_logs as l, tbl_employee as e WHERE l.name = e.bname ORDER BY e.lname ASC");

while($row = mysqli_fetch_array($sql)){
	if(isset($_SESSION[$row["name"]])){
		$tbody_rows.="<tr>";
		$tbody_rows.="<td>".$_SESSION[$row["name"]]["full_name"]."</td>";
		$tbody_rows.="<td><center>".$_SESSION[$row["name"]]["rate"]."</center></td>";
		$tbody_rows.="<td><center>".$_SESSION[$row["name"]]["days_present"]."</center></td>";
		
		$bp_total+=(float)($_SESSION[$row["name"]]["basic_pay"]);
		$tbody_rows.="<td><center>".number_format((float)($_SESSION[$row["name"]]["basic_pay"]),2)."</center></td>";
		$tbody_rows.="<td><center>".$_SESSION[$row["name"]]["undertime"]."</center></td>";

		$amt_total+=(float)($_SESSION[$row["name"]]["amount"]);
		$tbody_rows.="<td><center>".number_format((float)($_SESSION[$row["name"]]["amount"]),2)."</center></td>";

		if($_SESSION["on_off"] == "true"){
			$tbody_rows.="<td><center>".$_SESSION[$row["name"]]["overtime"]."</center></td>";
			$amt_ot_total+=(float)($_SESSION[$row["name"]]["amount_ot"]);
			$tbody_rows.="<td><center>".number_format((float)($_SESSION[$row["name"]]["amount_ot"]),2)."</center></td>";
		}

		$gp_total+=(float)($_SESSION[$row["name"]]["gp"]);
		$tbody_rows.="<td><center>".number_format((float)($_SESSION[$row["name"]]["gp"]),2)."</center></td>";

		$ss_total+=(float)($_SESSION[$row["name"]]["sss"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["sss"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["sss"]),2))."</center></td>";

		$philhealth_total+=(float)($_SESSION[$row["name"]]["philhealth"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["philhealth"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["philhealth"]),2))."</center></td>";

		$pagibig_total+=(float)($_SESSION[$row["name"]]["pag_ibig"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["pag_ibig"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["pag_ibig"]),2))."</center></td>";

		$tax_total+=(float)($_SESSION[$row["name"]]["tax"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["tax"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["tax"]),2))."</center></td>";

		$np_total+=(float)($_SESSION[$row["name"]]["np"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["np"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["np"]),2))."</center></td>";

		$hdmf_total+=(float)($_SESSION[$row["name"]]["hdmf_loan"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["hdmf_loan"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["hdmf_loan"]),2))."</center></td>";

		$sss_total+=(float)($_SESSION[$row["name"]]["sss_loan"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["sss_loan"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["sss_loan"]),2))."</center></td>";

		$mfc_total+=(float)($_SESSION[$row["name"]]["mf_cont"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["mf_cont"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["mf_cont"]),2))."</center></td>";

		$mfl_total+=(float)($_SESSION[$row["name"]]["mf_loan"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["mf_loan"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["mf_loan"]),2))."</center></td>";

		$ca_total+=(float)($_SESSION[$row["name"]]["ca"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["ca"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["ca"]),2))."</center></td>";

		$td_total+=(float)($_SESSION[$row["name"]]["td"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["td"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["td"]),2))."</center></td>";

		$nd_total+=(float)($_SESSION[$row["name"]]["nd"]);
		$tbody_rows.="<td><center>".(($_SESSION[$row["name"]]["nd"] == "") ? "-" : number_format((float)($_SESSION[$row["name"]]["nd"]),2))."</center></td>";
		$tbody_rows.="<td><center></center></td>";
		$tbody_rows.="</tr>";
	}
}

$tbody_rows.= "<tr>";
$tbody_rows.= "<td><center id='val'>"."-"."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";

if($_SESSION["on_off"] == "true"){
	$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
	$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
}

$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "<td><center id='val'>"." "."</center></td>";
$tbody_rows.= "</tr>";

$tfoot_rows.= "<tr>";
$tfoot_rows.= "<td><center><b>TOTAL</b></center></td>";
$tfoot_rows.= "<td></td>";
$tfoot_rows.= "<td></td>";
$tfoot_rows.= "<td><center><b>".(($bp_total == 0.00) ? "-" : number_format($bp_total, 2))."</b></center></td>";
$tfoot_rows.= "<td></td>";
$tfoot_rows.= "<td><center><b>".(($amt_total == 0.00) ? "-" : number_format($amt_total, 2))."</b></center></td>";

if($_SESSION["on_off"]=="true"){
	$tfoot_rows.= "<td></td>";
	$tfoot_rows.= "<td><center><b>".(($amt_ot_total == 0.00) ? "-" : number_format($amt_ot_total, 2))."</b></center></td>";
}

$tfoot_rows.= "<td><center><b>".(($gp_total == 0.00) ? "-" : number_format($gp_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($ss_total == 0.00) ? "-" : number_format($ss_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($philhealth_total == 0.00) ? "-" : number_format($philhealth_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($pagibig_total == 0.00) ? "-" : number_format($pagibig_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($tax_total == 0.00) ? "-" : number_format($tax_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($np_total == 0.00) ? "-" : number_format($np_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($hdmf_total == 0.00) ? "-" : number_format($hdmf_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($sss_total == 0.00) ? "-" : number_format($sss_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($mfc_total == 0.00) ? "-" : number_format($mfc_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($mfl_total == 0.00) ? "-" : number_format($mfl_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($ca_total == 0.00) ? "-" : number_format($ca_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($td_total == 0.00) ? "-" : number_format($td_total, 2))."</b></center></td>";
$tfoot_rows.= "<td><center><b>".(($nd_total == 0.00) ? "-" : number_format($nd_total, 2))."</b></center></td>";
$tfoot_rows.= "<td></td>";
$tfoot_rows.= "</tr>";

echo json_encode(array("tbody_rows"=>$tbody_rows, "tfoot_rows"=>$tfoot_rows));

?>