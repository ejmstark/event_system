<?php
	$mysql = new mysqli("localhost", "root", "","event_db");

	// Check connection
	if (!$mysql) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	}
	$year= $_GET['years'];
	$statement="SELECT    COUNT(*) as UserCount, MONTHNAME(user_account.addedAt)
						FROM      user_account
						WHERE     YEAR(user_account.addedAt) = '".$year."'
						AND user_account.user_status = 'Active'
						AND user_account.user_type = 'Regular'
						GROUP BY  MONTH(user_account.addedAt)";
	$res = mysqli_query($mysql,$statement);

	if($res){

		echo json_encode(mysqli_fetch_all($res));
	}else{
		echo 'null';
	}

?>
