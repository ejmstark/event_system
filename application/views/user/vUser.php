
<div class="content">
	<a href="<?php echo site_url();?>/CEvent/viewAllTickets/<?php echo $this->session->userdata['userSession']['userID'];?>"><button>My Tickets</button></a> <br>
	<a href="<?php echo site_url();?>/CEvent/displayEvent/"><button>Lists of Event</button></a> <br>
	<a href="<?php echo site_url();?>/CUser/search"><button>Search</button></a> <br>
	<a href="<?php echo site_url();?>/CEvent/viewPreferenceEvents/"><button>List of Preferences</button></a> <br>
	<a href="<?php echo site_url();?>/CEvent/index/"><button>Create Event</button></a> <br>
	<a href="<?php echo site_url();?>/CEvent/upcomingEvents/"><button>Upcoming</button></a> <br>
</div>
