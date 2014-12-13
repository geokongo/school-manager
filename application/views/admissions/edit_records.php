				<!-- row -->
				<div class="row">
					<!-- first column -->
					<div class="col-lg-6">
						<?php
							if(isset($chooseAdmissionNumber))
							{
								echo '<p class="lead">Choose and Admission Number to Search Records</p>';
								
								echo form_open('admissions/edit_records');
								echo form_hidden('actionf', 'searchAdmission');
								
								echo '<input name="admissionNumber" class="form-control" required autofocus /><p><p>';
								echo form_submit('submit', 'Search', 'class="btn btn-lg btn-primary"');

							}
							
							if(isset($recordsFound))
							{
								echo '<p class="lead"> Edit Student Records</p>';
								
								if(isset($studentRecords) AND $studentRecords->num_rows() < 1) //no student with this admissionNumber
								{
									echo '<p class="alert alert-danger">There no student with admission number '.$admissionNumber.' </p>';
								
								}
								elseif(isset($studentRecords) AND $studentRecords->num_rows() > 0)
								{
									$studentRecord = $studentRecords->row();
									
									
									echo form_open_multipart('admissions/edit_records');
									
									echo '<p class="lead"><strong>Edit Student Records</strong></p>';
									
									echo '<p class="lead">Admission Number '.stripslashes($studentRecord->adm).'</p>';
									echo '<hr />';
									
									echo form_hidden('actionf', 'edit_records');
									echo form_hidden('insert_id', $studentRecord->id);
									echo form_hidden('adm', stripslashes($studentRecord->adm));
									
									echo '<div class="adm_message"></div>';
									
									echo '<hr />';
									echo '<p class="lead">Personal Information</p>';
									
									echo form_label('First Name', 'f_name');
									$attrib2 = array(
													'name' => 'f_name',
													'id' => 'f_name',
													'value' => stripslashes($studentRecord->f_name),
													'class' => 'form-control',
												);
									echo form_input($attrib2).'<p><p>';
									
									echo form_label('Middle Name', 'm_name');
									$attrib3 = array(
													'name' => 'm_name',
													'id' => 'm_name',
													'value' => stripslashes($studentRecord->m_name),
													'class' => 'form-control',
												);
									echo form_input($attrib3).'<p><p>';
									
									echo form_label('Last Name', 'l_name');
									$attrib4 = array(
													'name' => 'l_name',
													'id' => 'l_name',
													'value' => stripslashes($studentRecord->l_name),
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
													'value' => stripslashes($studentRecord->pob),
													'class' => 'form-control',
												);
									echo form_input($attrib6).'<p><p>';
									
									echo form_label('Birth Certificate Number', 'bcn');
									$attrib7 = array(
													'name' => 'bcn',
													'id' => 'bcn',
													'value' => stripslashes($studentRecord->bcn),
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
									
									
									$attrib120 = array(
													'value' => stripslashes($studentRecord->coa),
													'class' => 'form-control',
													'id' => 'coa',
													'name' => 'coa',
													'required' => 'required'
												);
									echo form_input($attrib120).'<p><p>';
									
									echo '<p class="lead">Contact Information</p>';
									
									echo '<hr />';
									
									echo form_label('Postal Address', 'p_address');
									$attrib15 = array(
													'name' => 'p_address',
													'value' => stripslashes($studentRecord->p_address),
													
													'id' => 'p_address',
													'class' => 'form-control',
												);
									echo form_input($attrib15).'<p><p>';
									
									echo form_label('Postal Code', 'p_code');
									$attrib16 = array(
													'name' => 'p_code',
													'id' => 'p_code',
													'value' => stripslashes($studentRecord->p_code),
													'class' => 'form-control',
												);
									echo form_input($attrib16).'<p><p>';
									
									echo form_label('Town', 'town');
									$attrib17 = array(
													'name' => 'town',
													'value' => stripslashes($studentRecord->town),
													'id' => 'town',
													'class' => 'form-control',
												);
									echo form_input($attrib17).'<p><p>';
									
									echo '<p class="lead">Parent/Guardian Details</p>';
									echo '<hr />';
									
									echo form_label('First Name', 'pg_f_name');
									$attrib18 = array(
													'name' => 'pg_f_name',
													'value' => stripslashes($studentRecord->pg_f_name),
													'id' => 'pg_f_name',
													'class' => 'form-control',
												);
									echo form_input($attrib18).'<p><p>';
									
									echo form_label('Last Name', 'pg_l_name');
									$attrib19 = array(
													'name' => 'pg_l_name',
													'value' => stripslashes($studentRecord->pg_l_name),
													'id' => 'pg_l_name',
													'class' => 'form-control',
												);
									echo form_input($attrib19).'<p><p>';
									
									echo form_label('Phone', 'phone');
									$attrib20 = array(
													'name' => 'phone',
													'type' => 'number',
													'value' => stripslashes($studentRecord->phone),
													'id' => 'phone',
													'class' => 'form-control',
												);
									echo form_input($attrib20).'<p><p>';
									
									echo form_label('Email', 'email');
									$attrib21 = array(
													'type' => 'email',
													'placeholder' => 'user@example.com',
													'name' => 'email',
													'value' => stripslashes($studentRecord->email),
													'id' => 'email',
													'class' => 'form-control'
												);
									echo form_input($attrib21).'<p><p>';
									
									echo '<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button>';
									echo form_close();
											
									
								}
							
							
							}
							
						
						?>
					</div>
					<!-- close first column -->
				</div>
				<!-- close row -->