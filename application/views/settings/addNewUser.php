				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-6 -->
					<div class="col-lg-6">
						<?php 
							
							if(isset($addNewUser))
							{
								echo form_open();
								
								echo form_hidden('actionf', 'addNewUser');
							?>
								<p><strong>First Name</strong>
								<input type="text" name="firstName" required autofocus class="form-control" style="width : 60%; " /></p>
								<p><strong>Last Name</strong>
								<input type="text" name="lastName" required  class="form-control" style="width : 60%; " /></p>
								<p><strong>Username</strong>
								<input type="text" name="userName" required  class="form-control" style="width : 60%; " /></p>
								<p><strong>Password</strong>
								<input type="password" name="password" required  class="form-control" style="width : 60%; " /></p>
								<p><strong>Confirm Password</strong>
								<input type="password" name="confirmPassword" required  class="form-control" style="width : 60%; " /></p>
								<p><strong>Usertype</strong>
								<select name="userType" class="form-control" style="width : 60%; ">
									<option value="admin">admin</option>
									<option value="admissions">admissions</option>
									<option value="academics">academics</option>
								</select></p>
								<p><strong>Phone Number</strong>
								<input type="text" name="phoneNumber" required class="form-control" style="width : 60%; " /></p>
								<p><strong>Email</strong>
								<input type="text" name="emailAddress" class="form-control" required style="width : 60%; " /></p>
								<p><button type="submit" name="submit" class="btn btn-lg btn-primary"  />Save </button>
							  
							<?php
							
							}
							
							if(isset($userInfoObject))
							{
								if(isset($success))
								{
									echo '<p class="alert alert-success alert-dismissable">'.$success.'</p>';
								
								}
								
								foreach($userInfoObject->result() as $userInfoItem)
								{
									$userName = $userInfoItem->username;
									$firstName = $userInfoItem->f_name;
									$userType = $userInfoItem->usertype;
									$lastName = $userInfoItem->l_name;
									$userPhoneNumber = $userInfoItem->phone;
									$userEmail = $userInfoItem->email;
								
								}
								
								echo '<p class="lead">'.$userName.' Profile Settings</p>';
								
								echo '<p class="lead">'.$this->session->userdata('client_name').'</p>';
								echo '<table class="col-lg-8 table">';
								echo '<tr><td style="width : 45%; "><strong>Username</strong></td><td style="width : 45%; ">'.$userName.'</td><td style="width : 10%; "></td></tr>';
								echo '<tr><td><strong>Password</strong></td><td><a data-target="#changePassword" data-toggle="modal" title="Change your original password for security reasons">Change Password</a></td><td "></td></tr>';
								echo '<tr><td><strong>First Name</strong></td><td>'.$firstName.'</td><td><button type="button" data-toggle="modal" data-target="#editProfile" title="Click to Edit"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
								echo '<tr><td><strong>Last Name</strong></td><td>'.$lastName.'</td><td><button type="button" data-toggle="modal" data-target="#editProfile" title="Click to Edit"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
								echo '<tr><td><strong>Usertype</strong></td><td>'.$userType.'</td><td></td></tr>';
								
								echo '<tr><td><strong>Phone Number</strong></td><td>'.$userPhoneNumber.'</td><td><button type="button" data-toggle="modal" data-target="#editProfile" title="Click to Edit"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
								echo '<tr><td><strong>Email Address</strong></td><td>'.$userEmail.'</td><td><button type="button" data-toggle="modal" data-target="#editProfile" title="Click to Edit"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
								echo '</table>';
								
								?>
								<!-- edit Profile modal-->
								<div class="modal" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<!-- modal dialog -->
									<div class="modal-dialog">
										<!-- modal content -->
										<div class="modal-content">
											<!-- modal header -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
												<h4 class="modal-title"><?php echo $userName; ?> Profile Settings</h4>
											</div>
											<!-- /.modal header -->
											
											<!-- modal body -->
											<div class="modal-body col">
											
											<?php
											echo form_open('settings/profile');
											echo form_hidden('actionf', 'editProfile');
											echo form_hidden('userName', $userName);
											
											echo '<table class="col-lg-4 table">';
											echo '<tr><td style="width : 50%; "><strong>Username</strong></td><td style="width : 50%; ">'.$userName.'</td></tr>';
											echo '<tr><td><strong>First Name</strong></td><td><input type="text" name="fName" class="form-control" value="'.$firstName.'" required autofocus/></td></tr>';
											echo '<tr><td><strong>Last Name</strong></td><td><input type="text" name="lName" class="form-control" value="'.$lastName.'" required /></td></tr>';
											
											foreach($userInfoObject->result() as $userInfoItem)
											{
												$userPhoneNumber = $userInfoItem->phone;
												$userEmail = $userInfoItem->email;
											
											}
											echo '<tr><td><strong>Phone Number</strong></td><td><input type="text" name="phoneNumber" class="form-control" value="'.$userPhoneNumber.'" required /></td></tr>';
											echo '<tr><td><strong>Email Address</strong></td><td><input type="text" name="emailAddress" class="form-control" value="'.$userEmail.'" required /></td></tr>';
											echo '</table>';
											
											?>
											</div>
											<!-- /.modal body -->
											
											<!-- modal footer -->
											<div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
												<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
											</div>
											<!-- /.modal footer -->
										
										</div>
										<!-- modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.edit_marks modal -->
							
								<!-- change password modal-->
								<div class="modal" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<!-- modal dialog -->
									<div class="modal-dialog">
										<!-- modal content -->
										<div class="modal-content">
											<!-- modal header -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
												<h4 class="modal-title">Change Password for <?php echo $userName; ?></h4>
											</div>
											<!-- /.modal header -->
											
											<!-- modal body -->
											<div class="modal-body col">
											
											<?php
											echo form_open('settings/profile');
											echo form_hidden('actionf', 'changePassword');
											echo form_hidden('userName', $userName);
											
											echo '<table class="col-lg-4 table">';
											echo '<tr><td style="width : 50%; "><strong>Enter Old Password</strong></td><td style="width : 50%; "><input type="password" name="oldPassword"  id="oldPassword" class="form-control" required autofocus/></td></tr>';
											echo '<tr><td><strong>Enter New Password</strong></td><td><input type="password" name="newPassword" id="newPassword" class="form-control" required /></td></tr>';
											echo '<tr><td><strong>Conform New Password</strong></td><td><input type="password" name="newPasswordConfirm" class="form-control" /></td></tr>';
											echo '</table>';
											
											?>
											</div>
											<!-- /.modal body -->
											
											<!-- modal footer -->
											<div class="modal-footer">
												<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
												<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
											</div>
											<!-- /.modal footer -->
										
										</div>
										<!-- modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.change password modal -->
							<?php
							
							}
						
						?>
					</div>
					<!-- first column -->
				</div>
				<!-- close row -->