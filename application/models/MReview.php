<?php
	class MReview extends MY_model {

		const DB_TABLE = "review";
        const DB_TABLE_PK = "review_id";

        private $review_id;
        private $rating;
        private $description;
        private $ticket_id;

        public function loadEventReviews($eventId)
		{
			$this->db->select('*');
            $this->db->from("review as r");
            $this->db->join("ticket as t","r.ticket_id = t.ticket_id");
            $this->db->join("user_account as u","t.user_id = u.account_id");
	        $this->db->join("ticket_type AS tt","t.ticket_type_id = tt.ticket_type_id");
	        $this->db->join("event_info AS e","tt.event_id = e.event_id");
            $this->db->where("e.event_id = '$eventId'");
            $this->db->group_by("r.review_id");

			$query = $this->db->get();

			return $query->result();
			# code...
		}

	public function loadEventReviewAverageRating($eventId){
		$this->db->select("SUM(`r`.`rating`)/COUNT(*) AS 'avg_rating'");
		$this->db->from("review as r");
		$this->db->join("ticket as t","r.ticket_id = t.ticket_id");
		$this->db->join("ticket_type AS tt","t.ticket_type_id = t.ticket_type_id");
	        $this->db->join("event_info AS e","e.event_id = tt.event_id");
		$this->db->where("`event_id` = '$eventId'");
	
		$query = $this->db->get();
		return $query->result();
			# code...
	}


        public function getReviewId(){
            return $this->review_id;
        }

        public function setReviewId($review_id){
            $this->review_id = $review_id;
        }

        public function getRating(){
            return $this->Rating;
        }

        public function setRating($rating){
            $this->rating = $rating;
        }

        public function getDescription(){
            return $this->Description;
        }

        public function setDescription($description){
            $this->rating = $description;
        }

        public function getTicket_Id(){
            return $this->ticket_id;
        }

        public function setTicket_Id($rating){
            $this->ticket_id = $ticket_id;
        }


    	public function __construct(){

		}

	}
?>
