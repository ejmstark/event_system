<div class="content">
          <?php
				echo "<br><br>ALL USERS";
				
				foreach ($users as $user) {
					echo '<br>'.$user->account_id.'-'.$user->user_name.'-'.$user->first_name.'-'.$user->last_name.'-'.$user->middle_initial.'-'.$user->email.'-'.$user->birthdate.'-'.$user->gender.'-'.$user->contact_no;
				}
				
			?>		
          <br>