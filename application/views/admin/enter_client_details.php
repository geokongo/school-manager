				<!-- .row -->
				<div class="row">
					<!-- large column -->
					<div class="col-lg-6">
						<!-- .form-group -->
						<div class="form-group">
							<?php 
								echo form_open('admin/add_client');
								echo '<p class="lead">Fill the Client Details</p><p>';
								echo form_hidden('actionf', 'create_client_account');
								
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
								$attrib2 = array(
												'name' => 'client_name',
												'id' => 'client_name',
												'class' => 'form-control',
												'required' => 'required'
											);	
								echo form_input($attrib2).'</p><p>';

								echo form_label('First Name', 'f_name');
								$attrib3 = array(
												'name' => 'f_name',
												'id' => 'l_name',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib3).'</p><p>';
								
								echo form_label('Last Name', 'l_name');
								$attrib4 = array(
												'name' => 'l_name',
												'id' => 'l_name',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib4).'</p><p>';
								
								echo form_label('Phone', 'phone');
								$attrib5 = array(
												'name' => 'phone',
												'id' => 'phone',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib5).'</p><p>';
								
								echo form_label('Email', 'email');
								$attrib6 = array(
												'name' => 'email',
												'id' => 'email',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib6).'</p><p>';
								
								echo form_label('Postal Address', 'p_address');
								$attrib7 = array(
												'name' => 'p_address',
												'id' => 'p_address',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib7).'</p><p>';
								
								echo form_label('Postal Code', 'p_code');
								$attrib8 = array(
												'name' => 'p_code',
												'id' => 'p_code',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib8).'</p><p>';
								
								echo form_label('City', 'city');
								$attrib9 = array(
												'name' => 'city',
												'id' => 'city',
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib9).'</p><p>';
								
								?>
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control" >
								<option value="trial">Trial</option>
								<option value="fullUser">Full User</option>
								</select>
								<?php
								
								echo form_label('Start Date', 'startDate');
								$attrib11 = array(
												'name' => 'startDate',
												'id' => 'startDate',
												'class' => 'form-control datepicker',
												'required' => 'required'
											);
								echo form_input($attrib11).'</p><p>';
								
								echo form_label('Stop Date', 'stopDate');
								$attrib9 = array(
												'name' => 'stopDate',
												'id' => 'stopDate',
												'class' => 'form-control datepicker',
												'required' => 'required'
											);
								echo form_input($attrib9).'</p><p>';
								
								echo form_submit('submit', 'Save', 'class="btn btn-lg btn-primary"').'</p>';
								
								
								echo form_close();
							
							
							?>
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.column -->
				</div>
				<!-- /.row -->