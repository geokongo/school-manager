				<!-- .row -->
				<div class="row">
					<!-- large column -->
					<div class="col-lg-6">
						<!-- form-group -->
						<div class="form-group">
							<?php 
								echo form_open('admin/add_client');
								echo '<p class="lead">Create User Account for Client</p><p>';
								echo form_hidden('actionf', 'create_client_user');
								echo form_label('Client ID', 'client_id');
								
								$attrib1 = array(
												'name' => 'client_id',
												'id' => 'client_id',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $client_id
											);
								echo form_input($attrib1).'</p><p>';
								
								echo form_label('Institution', 'client_name');
								$attrib10 = array(
												'name' => 'client_name',
												'id' => 'client_name',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $client_name
											);
								echo form_input($attrib10).'</p><p>';
								
								echo form_label('Username', 'username');
								$attrib2 = array(
												'name' => 'username',
												'id' => 'username',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $username
											);
								echo form_input($attrib2).'</p><p>';
								
								echo form_label('Password', 'password');
								$attrib3 = array(
												'name' => 'password',
												'id' => 'password',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_password($attrib3).'</p><p>';
								
								echo form_label('First Name', 'f_name');
								$attrib4 = array(
												'name' => 'f_name',
												'id' => 'f_name',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $f_name
											);
								echo form_input($attrib4).'</p><p>';
								
								echo form_label('Last Name', 'l_name');
								$attrib5 = array(
												'name' => 'l_name',
												'id' => 'l_name',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $l_name
											);
								echo form_input($attrib5).'</p><p>';
								
								echo form_label('Usertype', 'usertype');
								$attrib6 = array(
												'name' => 'usertype',
												'id' => 'usertype',
												'class' => 'form-control',
												'required' => 'required',
												'value' => 'admin'
											);
								echo form_input($attrib6).'</p><p>';
								
								echo form_label('Phone', 'phone');
								$attrib7 = array(
												'name' => 'phone',
												'id' => 'phone',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $phone
											);
								echo form_input($attrib7).'</p><p>';
								
								echo form_label('Email', 'email');
								$attrib8 = array(
												'name' => 'email',
												'id' => 'email',
												'class' => 'form-control',
												'required' => 'required',
												'value' => $email
											);
								echo form_input($attrib8).'</p><p>';
								
								echo form_submit('submit', 'Save and Email', 'class="btn btn-lg btn-primary"');
								
								echo form_close();
							?>
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.column -->
				</div>
				<!-- /.row -->