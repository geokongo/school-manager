				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-6 -->
					<div class="col-lg-8">
						<?php 
							
							if(isset($registeredUsers))
							{
								echo '<p><strong>These are the current Users on the System</strong></p>';
								
								foreach($registeredUsers->result() as $thisUser)
								{
									$userName = $thisUser->username;
									$userType = $thisUser->usertype;
									$firstName = $thisUser->f_name;
									$lastName = $thisUser->l_name;
									$phoneNumber = $thisUser->phone;
									$emailAddress = $thisUser->email;
									
									echo '<p class="lead">'.$userName.'</p>';
									echo '<table class="table col-lg-8"><tr><td style="width : 40%; ">First Name</td><td style="width : 40%; ">'.$firstName.'</td><td style="width : 20%; "></td></tr>';
									echo '<tr><td> Last Name </td><td>'.$lastName.'</td><td></td></tr>';
									echo '<tr><td> Username </td><td>'.$userName.'</td><td></td></tr>';
									echo '<tr><td> Usertype </td><td>'.$userType.'</td><td><a href="">Change Usertype</td></tr>';
									echo '<tr><td> Password </td><td></td><td><a href="">Reset Password</td></tr>';
									echo '<tr><td> Phone Number </td><td>'.$phoneNumber.'</td><td></td></tr>';
									echo '<tr><td> Email Address</td><td>'.$emailAddress.'</td><td></td></tr>';
									echo '</table>';
								
								}
						
							
								
							
							}
						
						
						?>
					</div>
					<!-- first-column -->
				</div>
				<!-- close row -->