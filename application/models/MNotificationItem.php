<?php
	class MNotificationItem extends MY_model {
		private $event_id;
		private $event_date_start;
		private $event_date_end;
		private $no_tickets_total;
		private $event_status;
		private $event_name;
		private $event_details;
		private $event_category;
		private $event_venue;
		private $date_created;
		private $user_id;

		const DB_TABLE = "notification_item";
    	const DB_TABLE_PK = "notifID";

    	public function __construct(){
		}
		
	}
?>