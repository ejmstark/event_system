<?php
	class MAnnouncement extends MY_model {
		private $announcementID;
		private $announcementDetails;
		private $announcementStatus;
		private $postedBy;
		private $datePosted;

		const DB_TABLE = "announcement";
    	const DB_TABLE_PK = "announcementID";

    	public function __construct(){

		}

		public function getAnnouncementID(){
			return $this->announcementID;
		}

		public function getAnnouncementDetails(){
			return $this->announcementDetails;
		}

		public function getAnnouncementStatus(){
			return $this->announcementStatus;
		}

		public function getPostedBy(){
			return $this->postedBy;
		}

		public function getDatePosted(){
			return $this->datePosted;
		}

		public function setAnnouncementID($announcementID){
			$this->announcementID = (int) $announcementID;
		}

		public function setAnnouncementDetails($announcementDetails){
			$announcementDetails = trim($announcementDetails);
			$announcementDetails = filter_var($announcementDetails,FILTER_SANITIZE_STRING);
			$this->announcementDetails = $announcementDetails;
		}

		public function setAnnouncementStatus($announcementStatus){
			$this->announcementStatus = $announcementStatus;
		}

		public function setPostedBy($postedBy){
			$this->postedBy = (int) $postedBy;
		}

		public function setDatePosted($datePosted){
			$this->datePosted = $datePosted;
		}

		//FUNCTIONS
		public function updateAnnouncementStatus($id, $status) {
			$data = array('announcementStatus' => $status );

			return $this->update($id,$data);
		}

		public function loadAllAnnouncementDetails(){
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('user_account', $this::DB_TABLE . '.addedBy = user_account.account_id');
			$query = $this->db->get();

			return $query->result();
		}
		
		public function getUnviewedOfUser($user){
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('notification_item', 'notification_item.announcement = announcement.announcementID');
			$this->db->join('user_account', $this::DB_TABLE . '.addedBy = user_account.account_id');
			$this->db->where('notification_item.isViewed = "0"');
			$this->db->where('notification_item.user = "'.$user.'"');
			$this->db->where('announcement.announcementStatus = "OnGoing"');
			$this->db->order_by('announcement.addedBy', 'ASC');
			$this->db->limit(5);

			$query = $this->db->get();

			return $query->result();
		}

		public function getViewedOfUser($user){
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->join('notification_item', 'notification_item.announcement = announcement.announcementID');
			$this->db->join('user_account', $this::DB_TABLE . '.addedBy = user_account.account_id');
			$this->db->where('notification_item.isViewed = "1"');
			$this->db->where('notification_item.user = "'.$user.'"');
			$this->db->where('announcement.announcementStatus = "OnGoing"');
			$this->db->order_by('announcement.addedBy', 'ASC');
			$this->db->limit(5);

			$query = $this->db->get();

			return $query->result();
		}
	}
?>
