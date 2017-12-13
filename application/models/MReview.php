<?php
	class MReview extends MY_model {

		const DB_TABLE = "review";
        const DB_TABLE_PK = "review_id";

        private $rating;
        private $description
        private $ticket_id
            
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