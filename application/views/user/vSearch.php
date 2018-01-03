<div class="content">
	<form action="" method="post">
		<p>Search Via:<br>
		<select name="Search_options">
			<option value="event_name">Name</option>
			<option value="event_category">Category</option>
			<option value="event_venue">Venue</option>
			<option value="event_date_start">Date</option>
		</select>

<?php

$Search_options = false;
if(isset($_POST['Search_options'])){
	$Search_options = $_POST['Search_options'];
}
if(isset($Search_options)){
echo '<b>The method you choose is: <b>'.'<b>'.
$Search_options;
}

?>
<br>
<!-- <input type="submit" name="button" value="Submit"/></form> -->

		<form method="POST" action="<?php echo site_url()?>/user/cUser/search">
	  		Search:
	  		<input type="text" name="search_val" required="">
	  		<button type="button submit">Search</button><br>
		</form>


<?php

$con=mysqli_connect('localhost','root','','event_db');

// mysqli_select_db('event_db');

$search_val = false;
		if(isset($_POST['search_val'])){
			$search_val = $_POST['search_val'];
		}else{
			$search_val = "";
		}
		if(isset($search_val)){
			echo '<b>Results for: <b>'.'<b>'. $search_val;
		}
$query="SELECT event_id,event_name,event_date_start,event_status,event_venue,event_category FROM event_info WHERE $Search_options LIKE '%$search_val%'";
if(!$query){
	echo 'MySQL Error: '. mysqli_error();
	exit;
}
$result=mysqli_query($con,$query);

?>

<table width="600" border="1" cellpadding="1" cellspacing="1">
<tr>

<th>Event ID</th>
<th>Event Name</th>
<th>Event Date Start</th>
<th>Event Status</th>
<th>Event Venue</th>
<th>Event Category</th>	

<tr>

<?php
// print_r($data=mysqli_fetch_assoc($result));
if($search_val != ""){
	
		while($data=mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>".$data['event_id']."</td>";
			echo "<td>".$data['event_name']."</td>";
			echo "<td>".$data['event_date_start']."</td>";
			echo "<td>".$data['event_status']."</td>";
			echo "<td>".$data['event_venue']."</td>";
			echo "<td>".$data['event_category']."</td>";
			echo "<tr>";
		}// end while

		
	
}
?>

</table>