
<div class="content">
	<a href="<?php echo site_url();?>/user/cEvent/viewAllTickets/<?php echo $this->session->userdata['userSession']['userID'];?>"><button>My Tickets</button></a> <br>
	<a href="<?php echo site_url();?>/user/cEvent/displayEvent/"><button>Lists of Event</button></a> <br>
	<a href="<?php echo site_url();?>/user/cUser/search"><button>Search</button></a> <br>
	<a href="<?php echo site_url();?>/user/cEvent/viewPreferenceEvents/"><button>List of Preferences</button></a> <br>
	<a href="<?php echo site_url();?>/event/cEvent/index/"><button>Create Event</button></a> <br>
	<a href="<?php echo site_url();?>/event/cEvent/upcomingEvents/"><button>Upcoming</button></a> <br>
</div>
