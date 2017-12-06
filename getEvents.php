<?php
	$mysql = new mysqli("localhost", "root", "","event_db");

	// Check connection
	if (!$mysql) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	}
	$year= $_GET['years'];
	$statement="SELECT COUNT(*) as EventCount FROM `event_info` WHERE `event_status` = 'APPROVED' AND YEAR(`date_created`) = '2017'";

	$res = mysqli_query($mysql,$statement);

	if($res){
		echo json_encode(mysqli_fetch_all($res));
	}else{
		echo 'null';
	}

?>
