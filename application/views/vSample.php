
	        <div class="content">
	        Hi! Put your content here. Find me at "application\views\vSample.php"
					
			<?php
				echo "<br><br>Sample query using CI";
				echo "<br> controller:application\controllers\cLogin.php (userLogin function)";
				echo "<br> model:application\models\user\MUser.php (getAllUsers function)<br>";
				
				foreach ($users as $user) {
					echo '<br>'.$user->account_id.'-'.$user->user_name.'-'.$user->first_name.'-'.$user->last_name.'-'.$user->middle_initial.'-'.$user->email.'-'.$user->birthdate.'-'.$user->gender.'-'.$user->contact_no;
				}
				
			?>					

			 </div>
