$(document).ready(function () {
	$('#noti-button').click(function(){
		$.ajax({
			type: "get",
			url: "<?php echo base_url(); ?>" + "index.php/notification/displayAllNotification",
			success: function(responseData){
				console.log(responseData);
				$('#noti').html(responseData);
			},
			error: function(responseData){
				console.log(responseData);
			}
		});
	});

	function update(notif_id){
		$.ajax({
			type: "post",
			url: "<?php echo base_url(); ?>" + "index.php/notification/updateStatus",
			data: {'notif_id', notif_id},
			success: function(responseData){
				console.log(responseData);
			},
			error: function(responseData){
				console.log(responseData);
			}
		})
	}
});