<?php

require "php_conn.php";

session_start();

$emp_name = $_POST["emp_name"];
$table = "";
$present = 0;
$tut = 0.00;
$minutes_ut = 0.00;
$full_name = "";
$tfoot = "";
$toDec = "";	

$sql1 = mysqli_query($conn, "SELECT l.sick_leave, l.vacation_leave FROM tbl_leave_credits AS l, tbl_employee AS e WHERE e.bname = '$emp_name' AND e.no = l.no");
$r = mysqli_fetch_array($sql1);
$sl = $r["sick_leave"];
$vl = $r["vacation_leave"];

	function toDecimal($time){
		$x = explode(":", $time);
		$result = strval(number_format((int)($x[1]) / 60, 2, '.', ''));
		return number_format((float)($x[0].".".(float)(explode(".", $result)[1]) - 0.00), 2, '.', '');
	}

	function toTime($dec){
		return gmdate('H:i', floor($dec * 3600));
	}

	function getDiff($ts, $te){
		$startTime = new DateTime($ts);
		$endTime = new DateTime($te);
		return ($startTime->diff($endTime))->format("%H:%I");
	}

	function compute_ut($ft, $i){
		global $minutes_ut;
	    $dectime = toDecimal($ft);
	    
	    if($i==8.00){
	    	if($dectime > 8.00){
	    		$ut_arr = explode(":", getDiff($ft, "8:00"));
				$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
	    	}
	    }

	    if($i==12.00){
	    	if($dectime < 12.00){
	    		$ut_arr = explode(":", getDiff($ft, "12:00"));
				$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
	    	}
	    }

	    if($i==1.00){
	    	if($dectime > 13.00){
	    		$ut_arr = explode(":", getDiff($ft, "13:00"));
				$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
	    	}
	    }

	    if($i==5.00){
	    	if($dectime < 17.00){
	    		$ut_arr = explode(":", getDiff($ft, "17:00"));
				$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
	    	}
	    }
	}

	function validate_time($time, $i){
		$t = explode(":", $time);
		$final_time = " ";
		if($time != " "){
			if((int)$t[0] <= 11){
				$final_time = $time." AM";
			}else{
				if((int)$t[0] == 12){
					$final_time = $time." PM";
				}else{
					$final_time = ((int)$t[0] - 12).":".$t[1]." PM";	
				}
			}
			compute_ut($time, $i);
		}

		return $final_time;
	}

	if($_SESSION[$emp_name]["tsb"] == ""){

		$sql = mysqli_query($conn, "SELECT name FROM tbl_logs WHERE name LIKE '$emp_name'");
		$dates = array();
		$times = array();

		if(mysqli_num_rows($sql)!=0) {

			$sql = mysqli_query($conn, "SELECT DISTINCT ldate FROM tbl_logs");
			$getfull = mysqli_query($conn, "SELECT fname, mi, lname, no, rate FROM tbl_employee WHERE bname LIKE '$emp_name'");
			$row = mysqli_fetch_array($getfull);
			$full_name = ($row["no"]==null) ? $row["lname"].", ".$row["fname"]." ".$row["mi"]."." : $row["lname"].", ".$row["fname"]." ".$row["mi"].". (".$row["no"].")";

			$_SESSION[$emp_name]["full_name"] = $row["lname"].", ".$row["fname"]." ".$row["mi"].".";
			$_SESSION[$emp_name]["no"] = 		($row["no"]==null ? "" : $row["no"]);
			$_SESSION[$emp_name]["rate"] = 		$row["rate"];


			while($row = mysqli_fetch_array($sql)){
				array_push($dates, $row["ldate"]);
			}
			foreach($dates as $d){
				$table.="<tr>";
				$table.="<td><center id='val'>".$d."</center></td>";
				$sql = mysqli_query($conn, "SELECT ltime FROM tbl_logs WHERE name LIKE '$emp_name' AND ldate LIKE '$d'");
				if(mysqli_num_rows($sql)!=0){
					$present++;
					while($row = mysqli_fetch_array($sql)){
						array_push($times, $row["ltime"]);
					}
					$size = count($times);
					$min = array(8.00, 12.00, 1.00, 5.00);

					$time_in_1 = " ";
					$time_out_1 = " ";
					$time_in_2 = " ";
					$time_out_2 = " ";
					$out_once = 0;

					for($i = 0; $i < count($times); $i++){
						$t = explode(":", $times[$i]);
						
						if((int)$t[0] < 11){
							$time_in_1 = $times[$i];
						}

						if((int)$t[0] >= 11 && (int)$t[0] <= 12){
							if($out_once == 0){
								$time_out_1 = $times[$i];
								$out_once = 1;
							}
						}

						if((int)$t[0] >= 12 && (int)$t[0] <= 13){
							$time_in_2 = $times[$i];
						}

						if((int)$t[0] >= 15){
							$time_out_2 = $times[$i];
						}
					}
					$table.="<td><center id='val'>".validate_time($time_in_1, 8.00)."</center></td>";
					$table.="<td><center id='val'>".validate_time(($time_out_1 == " " ? "12:00" : $time_out_1), 12.00)."</center></td>";
					$table.="<td><center id='val'>".validate_time(($time_in_2 == " " ? "13:00" : $time_in_2), 1.00)."</center></td>";
					$table.="<td><center id='val'>".validate_time($time_out_2, 5.00)."</center></td>";
					$table.="<td><center id='val'>".date('H:i', mktime(0,$minutes_ut))."</center></td>";
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="</tr>";

					$times = array();
					$tut+=$minutes_ut;
					$minutes_ut = 0.00;
				}else{
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="<td><center id='val'>"." "."</center></td>";
					$table.="</tr>";
				}
			}
					$tfoot.="<tr>";
					$tfoot.="<td><center id='val'>"."-"."</center></td>";
					$tfoot.="<td><center id='val'>"." "."</center></td>";
					$tfoot.="<td><center id='val'>"." "."</center></td>";
					$tfoot.="<td><center id='val'>"." "."</center></td>";
					$tfoot.="<td><center id='val'>"." "."</center></td>";
					$tfoot.="<td><b><center id='tut'>".date('H:i', mktime(0,$tut))."</center></b></td>";
					$tfoot.="<td><b><center id='tot'>"." "."</center></b></td>";
					$tfoot.="</tr>";
			if($tut < 0){
				$_SESSION[$emp_name]["undertime"] = "0.00";	
			}else{
				$_SESSION[$emp_name]["undertime"] = toDecimal(date('H:i', mktime(0,$tut)));
			}
			$_SESSION[$emp_name]["tsb"] = $table;
			$_SESSION[$emp_name]["tsf"] = $tfoot;
			$_SESSION[$emp_name]["days_present"] = $present;
			echo json_encode(array("table"=>$table, "present"=>$present, "full_name"=>$full_name, "tfoot"=>$tfoot, "tutdec"=>$_SESSION[$emp_name]["undertime"], "sl"=>$sl, "vl"=>$vl));
		}else{
			echo "0";
		}
	}else{
		echo json_encode(array("table"=>$_SESSION[$emp_name]["tsb"], "present"=>$_SESSION[$emp_name]["days_present"], "full_name"=>$_SESSION[$emp_name]["full_name"]." (".$_SESSION[$emp_name]["no"].")", "tfoot"=>$_SESSION[$emp_name]["tsf"], "tutdec"=>$_SESSION[$emp_name]["undertime"], "sl"=>$sl, "vl"=>$vl));
	}
?>