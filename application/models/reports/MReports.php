<?php
	class MReports extends MY_model{

		public function __construct(){

		}

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
			///////////////////////////////////////
			///////Interface New Implementation////
			///////////////////////////////////////
			$this->db->select('event_name');
			$this->db->from('event_info');
			$this->db->where("event_status = 'APPROVED'");
			$this->db->where("date_created BETWEEN '".$startDate."' AND '".$endDate."'");
			$query = $this->db->get();
			return $query->num_rows();
			///////////////////////////////////////
			///////////////////////////////////////
		}


		public function numEventPerMonth($year){
			$query = "SELECT COUNT(*) as EventCount FROM `event_info` WHERE `event_status` = 'APPROVED' AND YEAR(`date_created`) = '2017'";
			$result = $this->db->query($query);


			return $result->result_array();
		}

		public function countUsers($startDate, $endDate){
			// $query = "SELECT DISTINCT `user_id`
			// 		  FROM `ticket`
			// 		  WHERE date_sold BETWEEN '$startDate' AND '$endDate'";
			// $result = $this->db->query($query);
      //
			// $return = $result->num_rows();
			// return $return;
			// $this->db->distinct();


			///////////////////////////////////////
			///////Interface New Implementation////
			///////////////////////////////////////
			$this->db->distinct();
			$this->db->select('user_id');
			$this->db->from('ticket');
			$this->db->where('date_sold BETWEEN "'. date('Y-m-d', strtotime($startDate)). '" and "'. date('Y-m-d', strtotime($endDate)).'"');
			$query = $this->db->get();
			return $query->num_rows();
			//////////////////////////////////////
			//////////////////////////////////////
		}

		public function getReportsUserMonthly($year){
			///////////////////////////////////////
			///////Interface New Implementation////
			///////////////////////////////////////
			$this->db->select('COUNT(*) as UserCount, MONTHNAME(user_account.date_account_created) as monthname');
			$this->db->from('user_account');
			$this->db->where("YEAR(user_account.date_account_created) = '".$year."'
		 										AND user_account.user_status = 'Active'
												AND user_account.user_type = 'Regular'
												GROUP BY  MONTH(user_account.date_account_created)");
			$query = $this->db->get();
			$result = $query->result();
			$arr_data = array();
			foreach ($result as $value) {
				$arr_data[] = [$value->UserCount,$value->monthname];
			}
			return $arr_data;
			/////////////////////////////////////
			/////////////////////////////////////
		}

		public function getReportsEventsMonthly($year){
			///////////////////////////////////////
			///////Interface New Implementation////
			///////////////////////////////////////
			$this->db->select('COUNT(*) as EventCount');
			$this->db->from('event_info');
			$this->db->where("event_status = 'APPROVED'");
			$this->db->where("YEAR(date_created)",$year);
			$query = $this->db->get();
			$result = $query->result();
			$arr_data = array();
			foreach ($result as $value) {
				$arr_data[] = [$value->EventCount];
			}
			return $arr_data;
			/////////////////////////////////////
			/////////////////////////////////////
		}
	}
?>
