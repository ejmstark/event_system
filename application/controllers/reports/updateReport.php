<?php 
	require ("sql_connect.php");

	$query = "SELECT * FROM quiz WHERE categories ='".$_GET['cat']."'";
	$res = mysqli_query($mysql,$query);

	if($res){
		echo json_encode(mysqli_fetch_all($res));
	}else{
		echo 'null';
	}

?>