
				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-6 -->
					<div class="col-lg-8">
					
							<?php 
							
								if(isset($error_message))
								{
									echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="fa fa-info-circle"></i><strong>'.$error_message.'</strong></div>';
									
								}
								
								if(isset($success_message))
								{
									echo '<div class="alert alert-success alert-dismissable"><strong>'.$success_message.'</strong></div>';
								
								}
								
									
								?>	<!-- form-group -->
										<div class="col-lg-6"><?php
										
									echo form_open_multipart('admissions/new_student', 'id="addNewStudent"');
									
									echo '<p class="lead"><strong>Admit a New Student</strong></p>';
									
									echo '<p class="lead">Admission Number</p>';
									echo '<hr />';
									
									echo form_hidden('actionf', 'add_student');
									echo form_hidden('insert_id', $tmpAdmissionNumber);
									$attrib1 = array(
													'name' => 'adm',
													'id' => 'adm',
													'class' => 'form-control',
													'required' => 'required',
													'value' => $tmpAdmissionNumber
												);
									echo form_input($attrib1).'<p><p>';
									
									echo '<div class="adm_message"></div>';
									
									echo '<hr />';
									echo '<p class="lead">Personal Information</p>';
									
									echo form_label('First Name', 'f_name');
									$attrib2 = array(
													'name' => 'f_name',
													'id' => 'f_name',
													'class' => 'form-control',
												);
									echo form_input($attrib2).'<p><p>';
									
									echo form_label('Middle Name', 'm_name');
									$attrib3 = array(
													'name' => 'm_name',
													'id' => 'm_name',
													'class' => 'form-control',
												);
									echo form_input($attrib3).'<p><p>';
									
									echo form_label('Last Name', 'l_name');
									$attrib4 = array(
													'name' => 'l_name',
													'id' => 'l_name',
													'class' => 'form-control',
												);
									echo form_input($attrib4).'<p><p>';
									
									echo '<input class="hidden" type="text" id="dob" name="dob" /><p>';
									echo form_label('Date of Birth', 'dob');
									$attrib5 = array(
													'name' => 'datepicker',
													'type' => 'date',
													'id' => 'datepicker',
													'class' => 'form-control',
												);
									echo form_input($attrib5).'<p><p>';
									
									echo form_label('Place of Birth', 'pob');
									$attrib6 = array(
													'name' => 'pob',
													'id' => 'pob',
													'class' => 'form-control',
												);
									echo form_input($attrib6).'<p><p>';
									
									echo form_label('Birth Certificate Number', 'bcn');
									$attrib7 = array(
													'name' => 'bcn',
													'id' => 'bcn',
													'class' => 'form-control',
												);
									echo form_input($attrib7).'<p><p>';
									
									echo '<p class="lead">Gender</p>';
									
									echo '<hr />';
									
									echo form_label('Male &nbsp&nbsp', 'male');
									$attrib8 = array(
													'name' => 'gender',
													'id' => 'male',
													'value' => 'M',
													'checked' => 'checked'
												);
									echo form_radio($attrib8).'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
									
									echo form_label('Female &nbsp&nbsp', 'female');
									$attrib8 = array(
													'name' => 'gender',
													'id' => 'female',
													'value' => 'F'
												);
									echo form_radio($attrib8);								
									
									echo '<hr />';
									echo form_label('Nationality', 'nationality');
									
									$countries = array(
													'Kenya' => 'Kenya',
													'Uganda' => 'Uganda',
													'Tanzania' => 'Tanzania',
													'Somalia' => 'Somalia',
													'Sudan' => 'Sudan',
													'Ethiopia' => 'Ethiopia',
													'Eritrea' => 'Eritrea',
													'Djibouti' => 'Djibouti',
													'Rwanda' => 'Rwanda',
													'Burundi' => 'Burundi'
												);
									echo form_dropdown('nationality', $countries, '', 'class="form-control" id="nationality" required="required"').'<p><p><p>';
									
									echo form_label('County', 'county');
									$counties = array(
													'Nairobi' => 'Nairobi',
													'Embu' => 'Embu',
													'Emurua-Dikir' => 'Emurua-Dikir'
												);
									echo form_dropdown('county', $counties, '', 'class="form-control" id="county" required="required"').'<p><p>';
									
									
									echo '<hr />';
									
									echo '<p class="lead">Passport Photo</p>';
									$attrib11 = array( 
													'name' => 'userfile',
													'id' => 'userfile',
													'class' => 'btn btn-lg btn-primary'
												);
									echo form_upload($attrib11).'<p><p>';
									
									echo '</div>';
									echo '<div class="col-lg-4">
									&nbsp&nbsp</div>';
									echo '<div class="col-lg-6">';
									
								echo '<p class="lead">Date of Admission</p>';
								echo '<hr />';
								
								echo form_hidden('doa',time());
								
								$attrib12 = array(
												'value' => date('l, F jS, Y'),
												'class' => 'form-control',
												'required' => 'required'
											);
								echo form_input($attrib12).'<p><p>';
								
								echo '<hr />';
								
								echo form_label('Class of Admission', 'coa');
								
								echo '<select name="coa" id="coa" class="form-control" >';
								echo '<option value="CLASS8">CLASS 8</option>';
								echo '<option value="CLASS7">CLASS 7</option>';
								echo '<option value="CLASS6">CLASS 6</option>';
								echo '<option value="CLASS5">CLASS 5</option>';
								echo '<option value="CLASS4">CLASS 4</option>';
								echo '<option value="CLASS3">CLASS 3</option>';
								echo '<option value="CLASS2">CLASS 2</option>';
								echo '<option value="CLASS1">CLASS 1</option>';
								echo '<option value="PREUNIT">PRE UNIT</option>';
								echo '<option value="NURSERY">NURSERY</option>';
								echo '<option value="BABYCLASS">BABY CLASS</option>';
								echo '</select><p><p>';
								echo '<p><p>';
								echo '<p class="lead">Contact Information</p>';
								
								echo '<hr />';
								
								echo form_label('Postal Address', 'p_address');
								$attrib15 = array(
												'name' => 'p_address',
												'value' => 'P.O.BOX ',
												'id' => 'p_address',
												'class' => 'form-control',
											);
								echo form_input($attrib15).'<p><p>';
								
								echo form_label('Postal Code', 'p_code');
								$attrib16 = array(
												'name' => 'p_code',
												'id' => 'p_code',
												'class' => 'form-control',
											);
								echo form_input($attrib16).'<p><p>';
								
								echo form_label('Town', 'town');
								$attrib17 = array(
												'name' => 'town',
												'id' => 'town',
												'class' => 'form-control',
											);
								echo form_input($attrib17).'<p><p>';
								
								echo '<p class="lead">Parent/Guardian Details</p>';
								echo '<hr />';
								
								echo form_label('First Name', 'pg_f_name');
								$attrib18 = array(
												'name' => 'pg_f_name',
												'id' => 'pg_f_name',
												'class' => 'form-control',
											);
								echo form_input($attrib18).'<p><p>';
								
								echo form_label('Last Name', 'pg_l_name');
								$attrib19 = array(
												'name' => 'pg_l_name',
												'id' => 'pg_l_name',
												'class' => 'form-control',
											);
								echo form_input($attrib19).'<p><p>';
								
								echo form_label('Phone', 'phone');
								$attrib20 = array(
												'name' => 'phone',
												'type' => 'number',
												'id' => 'phone',
												'class' => 'form-control',
											);
								echo form_input($attrib20).'<p><p>';
								
								echo form_label('Email', 'email');
								$attrib21 = array(
												'type' => 'email',
												'placeholder' => 'user@example.com',
												'name' => 'email',
												'id' => 'email',
												'class' => 'form-control'
											);
								echo form_input($attrib21).'<p><p>';
								
								echo '<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button>';
								echo form_close();
								
								echo '</div>';
							?>
						</div>
						<!-- /.form-group -->
					</div>
					<!-- /.second-column -->
				</div>
				<!-- /.row -->