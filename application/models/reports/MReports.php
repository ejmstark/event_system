<?php
	class MReports extends MY_model{
		const DB_TABLE = "ticket";
    const DB_TABLE_PK = "ticket_id";

		public function __construct(){
			parent::__construct();
			$this->DB_TABLE = "ticket";
	    $this->DB_TABLE_PK = "ticket_id";
		}

		public function getUserCountMonthly($year){
			$statement="SELECT    COUNT(*) as UserCount
						FROM      user_account
						WHERE     YEAR(user_account.addedAt) = ".$year."
						AND user_account.user_status = 'Active'
						AND user_account.user_type = 'Regular'
						GROUP BY  MONTH(user_account.addedAt)";
			$query = $this->db->query($statement);

			return $query->result_array();
		}

		public function totalUsers(){
			$this->db->select('COUNT(*) as UserCount');
			$this->db->from('user_account');
			$this->db->where("user_status = 'Active'");
			$this->db->where("user_type = 'Regular'");			
			$query = $this->db->get();
			$result = $query->result();

			return $result[0]->UserCount;
		}
		
		public function cardsSold(){
			
			$this->db->select('COUNT(*) as CardCount');
			$this->db->from('card');
			$this->db->where("cardStatus = 0");	
			$query = $this->db->get();
			$result = $query->result();

			return $result[0]->CardCount;
		}
		
		public function numEvents($startDate, $endDate){
			$this->db->select('event_name');
			$this->db->from('event_info');
			$this->db->where("event_status = 'APPROVED'");
			$query = $this->db->get();
			return $query->num_rows();
		}


		public function totalnumEvents($type){
			if($type==1){
				$this->db->select('event_name');
				$this->db->from('event_info');
				$this->db->where("event_status = 'APPROVED'");
			}else{
				$this->db->select('event_name');
				$this->db->from('event_info');
				$this->db->where("event_status = 'REJECTED'");
			}
			
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function showApprovedEvents(){
			$this->db->select('event_name');
			$this->db->select('event_id');
			$this->db->from('event_info');
			$this->db->where("event_status = 'APPROVED'");
			$query = $this->db->get();

			return $query->result_array();
		}


		public function countAttendees($event_id){
			$statement = "SELECT DISTINCT U.user_name
						  FROM user_account U, ticket_type TT, event_info E, ticket T
						  WHERE U.account_id = T.user_id AND T.ticket_type_id = TT.ticket_type_id AND TT.event_id = '$event_id'";
			$query = $this->db->query($statement);
			  
			return $query->num_rows();

		}

		public function numEventPerMonth($year){
			$query = "SELECT COUNT(*) as EventCount FROM `event_info` WHERE `event_status` = 'APPROVED' AND YEAR(`date_created`) = '2017'";
			$result = $this->db->query($query);


			return $result->result_array();
		}

		public function nameAttendees($event_id){
			$statement = "SELECT DISTINCT U.user_name
						  FROM user_account U, ticket_type TT, event_info E, ticket T
						  WHERE U.account_id = T.user_id AND T.ticket_type_id = TT.ticket_type_id AND TT.event_id = '$event_id'";
			$query = $this->db->query($statement);
			  
			return $query->result_array();

		}

		public function countUsers($startDate, $endDate){
			$where = array('date_sold >=' => date('Y-m-d', strtotime($startDate)),'date_sold <=' => date('Y-m-d', strtotime($endDate)));
			return $this->select_certain_where_isDistinct_hasOrderBy_hasGroupBy_isArray('user_id',$where,TRUE,FALSE,FALSE,TRUE);
		}


	}
?>
