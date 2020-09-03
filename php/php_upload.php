<?php

$data = array();
require "php_conn.php";

$sql = mysqli_query($conn, "SELECT * FROM tbl_logs");

if(isset($_GET['files']))
{	
	$deptId = $_GET["deptId"];
	$error = false;
	$files = array();

	$uploaddir = '../logs/';
	foreach($_FILES as $file)
	{
		$fileName = $file['name'];
		
		if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir .$file['name'];
			$fn = fopen($uploaddir.$file['name'],"r");
			if(mysqli_num_rows($sql)==0){
				try{
					while(! feof($fn)){
						$row = explode(",",fgets($fn));
						$id = (int) $row[0];
						$name = $row[1];
						$date_time = explode(" ",$row[2]);
						mysqli_query($conn, "INSERT INTO tbl_logs VALUES('$id', '$name', '$date_time[0]', '$date_time[1]')");
					}
				}catch(Error $e){

				}
				fclose($fn);
			}else{
				$error = true;
			}
		}else{
		    $error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

?>