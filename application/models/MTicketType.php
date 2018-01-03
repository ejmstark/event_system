<?php
	class MTicketType extends MY_Model {
		private $ticket_type_id;

		const DB_TABLE = "ticket_type";
    	const DB_TABLE_PK = "ticket_type_id"; 


		/* GETTER AND SETTERS */
			

		public function getTicket_type_id(){
			return $this->ticket_type_id;
		}

		public function setTicket_type_id($ticket_type_id){
			$this->ticket_type_id = $ticket_type_id;
		}


		public function loadType($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('event_id', $id);

			$query = $this->db->get();
			
			return $query->result();
		}

	
	} 
?>
