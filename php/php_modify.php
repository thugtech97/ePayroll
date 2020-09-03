<?php

$minutes_ut = 0.00;

function toDecimal($time){
	$x = explode(":", $time);
	$result = strval(number_format((int)($x[1]) / 60, 2, '.', ''));
	return number_format((float)($x[0].".".(float)(explode(".", $result)[1]) - 0.00), 2, '.', '');
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
    		$ut_arr = explode(":", getDiff("12:00", $ft));
			$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
    	}
    }

    if($i==13.00){
    	if($dectime > 1.00 && (explode(".",strval($dectime))[0])!="12"){
    		$ut_arr = explode(":", getDiff($ft, "1:00"));
			$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
    	}
    }

    if($i==17.00){
    	if($dectime < 5.00){
    		$ut_arr = explode(":", getDiff("5:00", $ft));
			$minutes_ut+=((int)$ut_arr[0] * 60) + (int)$ut_arr[1];
    	}
    }

    //echo $dectime;
}

compute_ut(($_POST["t1"]=="" ? "8:00" : $_POST["t1"]), 8.00);
compute_ut(($_POST["t2"]=="" ? "12:00" : $_POST["t2"]), 12.00);
compute_ut(($_POST["t3"]=="" ? "1:00" : $_POST["t3"]), 13.00);
compute_ut(($_POST["t4"]=="" ? "5:00" : $_POST["t4"]), 17.00);

echo date('H:i', mktime(0,$minutes_ut));

?>