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

	}
?>