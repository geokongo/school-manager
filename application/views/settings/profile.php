				<!-- main row -->
				<div class="row">
					<!-- first column -->
					<div class="col-lg-8 center-block">
						<?php 
							if(isset($userInfoObject))
							{
								if(isset($success))
								{
									echo '<p class="alert alert-success">Update Successful!</p>';
								
								}
								echo '<p class="lead">Profile Settings</p>';
								
								echo '<p class="lead">'.$this->session->userdata('client_name').'</p>';
								echo '<table class="col-lg-8 table">';
								echo '<tr><td style="width : 45%; "><strong>Username</strong></td><td style="width : 45%; ">'.$this->session->userdata('username').'</td><td style="width : 10%; "></td></tr>';
								echo '<tr><td><strong>Password</strong></td><td><a data-target="#changePassword" data-toggle="modal" title="Change your original password for security reasons">Change Password</a></td><td "></td></tr>';
								echo '<tr><td><strong>First Name</strong></td><td>'.$this->session->userdata('f_name').'</td><td><button type="button" data-toggle="modal" data-target="#editProfile" title="Click to Edit"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
								echo '<tr><td><strong>Last Name</strong></td><td>'.$this->session->userdata('l_name').'</td><td><button type="button" data-toggle="modal" data-target="#editProfile" title="Click to Edit"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
								echo '<tr><td><strong>Usertype</strong></td><td>'.$this->session->userdata('usertype').'</td><td></td></tr>';
								
								foreach($userInfoObject->result() as $userInfoItem)
								{
									$userPhoneNumber = $userInfoItem->phone;
									$userEmail = $userInfoItem->email;
								
								}
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
												<h4 class="modal-title">Edit Profile Settings</h4>
											</div>
											<!-- /.modal header -->
											
											<!-- modal body -->
											<div class="modal-body col">
											
											<?php
											echo form_open('settings/profile');
											echo form_hidden('actionf', 'editProfile');
											echo form_hidden('userName', $this->session->userdata('username'));
											
											echo '<table class="col-lg-4 table">';
											echo '<tr><td style="width : 50%; "><strong>Username</strong></td><td style="width : 50%; ">'.$this->session->userdata('username').'</td></tr>';
											echo '<tr><td><strong>First Name</strong></td><td><input type="text" name="fName" class="form-control" value="'.$this->session->userdata('f_name').'" required autofocus/></td></tr>';
											echo '<tr><td><strong>Last Name</strong></td><td><input type="text" name="lName" class="form-control" value="'.$this->session->userdata('l_name').'" required /></td></tr>';
											
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
												<h4 class="modal-title">Change Password</h4>
											</div>
											<!-- /.modal header -->
											
											<!-- modal body -->
											<div class="modal-body col">
											
											<?php
											echo form_open('settings/profile');
											echo form_hidden('actionf', 'changePassword');
											echo form_hidden('userName', $this->session->userdata('username'));
											
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
					<!-- /close first column -->
				</div>
				<!-- /close row -->