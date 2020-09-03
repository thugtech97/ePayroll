
<?php 
  
// Declare two dates 
$Date1 = '27-2-2019'; 
$Date2 = '3-3-2019'; 
  
// Declare an empty array 
$array = array(); 
  
// Use strtotime function 
$Variable1 = strtotime($Date1); 
$Variable2 = strtotime($Date2); 
  
// Use for loop to store dates into array 
// 86400 sec = 24 hrs = 60*60*24 = 1 day 
for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                $currentDate += (86400)) { 
                                      
$Store = date('y-m-d', $currentDate); 
$array[] = $Store; 

} 
  
// Display the dates in array format 
foreach ($array as $key) {
	echo $key."<br>";	
}

?> 
