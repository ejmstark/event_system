<?php
	class MReports extends MY_model {

		public function getUserCountMonthly($year){
			$statement="SELECT    COUNT(*) as UserCount
						FROM      user_account
						WHERE     YEAR(user_account.date_account_created) = ".$year."
						AND user_account.user_status = 'Active'
						AND user_account.user_type = 'Regular'
						GROUP BY  MONTH(user_account.date_account_created)";
			$query = $this->db->query($statement);

			return $query->result_array();
		}

		public function numEvents($startDate, $endDate){
			$query = "SELECT `event_name` 
					  FROM `event_info` 
					  WHERE  `event_status` = 'APPROVED' AND `date_created` BETWEEN '$startDate' AND '$endDate'";
			$result = $this->db->query($query);
			
			$return = $result->num_rows();
			return $return;
			
		}


		public function numEventPerMonth($year){
			$query = "SELECT COUNT(*) as EventCount FROM `event_info` WHERE `event_status` = 'APPROVED' AND YEAR(`date_created`) = '2017'";
			$result = $this->db->query($query);


			console.log($result);
			return $result->result_array();

		}
		
		public function countUsers($startDate, $endDate){
			$query = "SELECT DISTINCT `user_id` 
					  FROM `ticket`
					  WHERE date_sold BETWEEN '$startDate' AND '$endDate'";
			$result = $this->db->query($query);
	
			$return = $result->num_rows();
			return $return;
		}



	}
?>
