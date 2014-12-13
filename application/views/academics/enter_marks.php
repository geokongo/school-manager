				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-6 -->
					<div class="col-lg-6">
						<?php
							if(isset($selectOptions)) //the selections have not yet been made so display the selection form
							{
								if(isset($error_message))
								{
									echo '<p class="alert alert-danger">'.$error_message.'</p>';
								
								}
								
								echo '<p class="lead"> Enter Marks</p><hr />';
								echo '<p><strong>Select the Marks to Enter below</strong></p>';
								
									echo form_open('academics/enter_marks');
									echo form_hidden('actionf', 'get_class_list');
									echo form_label('Class', 'class');
									
									echo '<select name="class" id="class" class="form-control" required="required">';
									foreach($availableClassesObject->result() as $classOptions)
									{
										echo '<option value="'.stripslashes($classOptions->class).'">'.strtoupper(stripslashes($classOptions->class)).'</option>';
									
									}
									
									echo '</select><p><p>';
								
									echo '<div class="class_options">';
									echo '<div class="streams">';
									
									$firstClassObject = $availableClassesObject->row();
									$firstClassStreamsArray = unserialize(stripslashes($firstClassObject->streams));
									
									echo form_label('Stream', 'stream');
									
									if(empty($firstClassStreamsArray))
									{
										echo '<p class="alert alert-danger">No registered streams yet</p>';
									
									}
									else
									{
										$streamsArray = array_keys($firstClassStreamsArray);
										$stream = $streamsArray[0];
										
										echo '<select name="stream" id="stream" class="form-control" required="required">';
										foreach($streamsArray as $streamIndex => $streamName)
										{
											echo '<option value="'.stripslashes($streamName).'">'.strtoupper(stripslashes($streamName)).'</option>';
											
										}
										echo '</select>';
									}
									echo '</div>';
									echo '<div class="exams">';
									
									$classExamsArray = unserialize(stripslashes($firstClassObject->exams));
									
									echo form_label('Exam', 'exam');
									
									if(empty($classExamsArray))
									{
										echo '<p class="alert alert-danger">No registered exams yet</p>';
									
									}
									else
									{
										$count = count($classExamsArray);
										
										echo '<select name="exam" id="exam" class="form-control" required="required">';
										for($itr = 0; $itr < $count; $itr++)
										{
											echo '<option value="'.stripslashes($classExamsArray[$itr]).'">'.strtoupper(stripslashes($classExamsArray[$itr])).'</option>';
										
										}
										echo '</select>';
										
									}
									echo '</div>';
									echo '<div class="subjects">';
									
									echo form_label('Subject', 'subject');
									if(isset($stream))
									{
										$streamSubjectsArray = $firstClassStreamsArray[$stream]['subjects'];
										
										echo '<select name="subject" id="subject" class="form-control" required="required">';
										foreach($streamSubjectsArray as $subjectIndex => $subjectName)
										{
											echo '<option value="'.stripslashes($subjectName).'">'.strtoupper(stripslashes($subjectName)).'</option>';
										
										}
										echo '</select>';
									
									}
									else
									{
										echo '<p class="alert alert-danger">No registered subjects for this stream</p>';
									
									}
									echo '</div>';
									
								echo '</div>';
								
								echo form_label('Term', 'term');
								echo '<select name="term" id="term" class="form-control" required="required">';
								echo '<option value="TERM1">TERM1</option>';
								echo '<option value="TERM2">TERM2</option>';
								echo '<option value="TERM3">TERM3</option>';
								echo '</select><p>';
								
								echo form_label('Year', 'year');
								echo '<select name="year" id="year" class="form-control" required="required">';
								echo '<option value="2014">2014</option>';
								echo '<option value="2013">2013</option>';
								echo '</select><p>';
								
								echo form_submit('submit', 'Procede', 'class="btn btn-lg btn-primary"');
								
								echo form_close();
								
							
							}
							
							if(isset($class_list))
							{
								echo '<p class="lead">'.strtoupper(stripslashes($class)).' '.strtoupper(stripslashes($stream)).' '.strtoupper(stripslashes($exam)).'</p>';
								echo '<p class="lead">'.strtoupper(stripslashes($subject)).' '.strtoupper(stripslashes($term)).' '.stripslashes($year).'</p><hr />';
								
								if($class_list->num_rows() > 0)
								{
									echo form_open('academics/enter_marks');
									echo form_hidden('actionf', 'enter_marks');
									echo form_hidden('class', stripslashes($class));
									echo form_hidden('stream', stripslashes($stream));
									echo form_hidden('exam', stripslashes($exam));
									echo form_hidden('subject', stripslashes($subject));
									echo form_hidden('term', stripslashes($term));
									echo form_hidden('year', stripslashes($year));
									
									echo '<table class="table col-lg-6">';
									echo '<tr ><thead><th style="width : 10%; ">ADM</th><th style="width : 45%; ">NAME</th><th style="width : 15%; ">SCORE</th><th style="width : 15%; ">OUT OF</th><th style="width : 15%; ">100%</th></thead></tr>';
									
									echo '<tbody>';
									
									foreach($class_list->result() as $student)
									{
										
										echo '<tr><td>'.stripslashes($student->adm).'</td><td>'.stripslashes($student->f_name).' '.stripslashes($student->l_name).'</td><td><input name="'.stripslashes($student->adm).'" type="text" class="score form-control" /></td><td><input type="text" class="outOfScore form-control" /></td><td><input type="text" class="form-control" name="score['.stripslashes($student->adm).']" id="'.stripslashes($student->adm).'" /></td></tr>';
									
									}
									
									echo '</tbody></table>';
									
									echo form_submit('submit', 'Save', 'class="btn btn-lg btn-primary"');
									echo form_close();
								}
								else
								{
									echo '<p class="alert alert-danger"> No registered students for '.stripslashes($class).' '.stripslashes($stream).' yet.</p>';
								
								}
							}
							
							if(isset($noClassesYet))
							{
								echo '<p class="lead">Enter Marks.</p>';
								echo '<p class="alert alert-danger"> No registered classes yet! You need to register classes before you can enter marks.</p>';
							
							}
							
						?>
					</div>
					<!-- /.first-column -->
					
					<!-- middle column to create some gutter space -->
					<div class="col-lg-2">
					
					</div>
					<!-- /.middle column -->
					
				</div>
				<!-- /.row -->