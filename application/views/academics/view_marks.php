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
									echo form_hidden('actionf', 'get_marks');
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
						
						
						
							if(isset($marks))
							{
								echo '<p class="lead">'.strtoupper($class).' '.strtoupper($stream).' '.strtoupper($exam).'</p>';
								echo '<p class="lead">'.strtoupper($subject).' '.strtoupper($term).' '.$year.'</p>';
								
								if($marks->num_rows() > 0)
								{
									echo '<table class="table col-lg-6">';
									echo '<tr ><thead><th style="width : 15%; ">ADM</th><th style="width : 55%; ">NAME</th><th style="width : 15%; ">SCORE</th><th style="width : 15%; ">EDIT</th></thead></tr>';
									
									echo '<tbody>';
									
									foreach($marks->result() as $row)
									{
										$scores = $row->exams;
										$scores = unserialize($scores);
										
										echo '<tr><td>'.$row->adm.'</td><td>'.strtoupper($row->f_name).' '.strtoupper($row->m_name).' '.strtoupper($row->l_name).'</td><td>'.$scores[$term][$exam][$subject].'</td><td><button type="button" data-toggle="modal" data-target="#edit_marks" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-open"></i></button></td></tr>';
									
									}
									
									echo '</tbody></table>';
								
								}
								else
								{
									echo '<p class="alert alert-danger"> No registered students for '.strtoupper($class).' '.strtoupper($stream).' yet.</p>';
								
								}
								
							}
							
							if(isset($noClassesYet))
							{
								echo '<p class="lead">View/Edit Marks.</p>';
								echo '<p class="alert alert-danger">No registered classes yet! You need to add classes first before you can Enter/Edit marks.</p>';
							
							}
						
						?>
					</div>
					<!-- /.first-column -->
					
					<?php
					if(isset($marks))
					{
					?>
					<!-- edit marks modal-->
					<div class="modal" id="edit_marks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<!-- modal dialog -->
						<div class="modal-dialog">
							<!-- modal content -->
							<div class="modal-content">
								<!-- modal header -->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
									<h4 class="modal-title">
									<?php	echo strtoupper($class).' '.strtoupper($stream).' '.strtoupper($exam).' '.strtoupper($subject).' '.strtoupper($term).' '.$year; ?>
									</h4>
								</div>
								<!-- /.modal header -->
								
								<!-- modal body -->
								<div class="modal-body col">
								
								<?php
								echo form_open('academics/enter_marks');
								echo form_hidden('actionf', 'enter_marks');
								echo form_hidden('class', $class);
								echo form_hidden('stream', $stream);
								echo form_hidden('exam', $exam);
								echo form_hidden('subject', $subject);
								echo form_hidden('term', $term);
								echo form_hidden('year', $year);
								
								echo '<table class="table col-lg-6">';
								echo '<tr ><thead><th style="width : 15%; ">ADM</th><th style="width : 65%; ">NAME</th><th style="width : 20%; ">SCORE</th></thead></tr>';
								
								echo '<tbody>';
								
								foreach($marks->result() as $row)
								{
									$scores = unserialize($row->exams);
								
									echo '<tr><td>'.$row->adm.'</td><td>'.strtoupper($row->f_name).' '.strtoupper($row->m_name).' '.strtoupper($row->l_name).'</td><td><input type="text" class="form-control" name="score['.$row->adm.']" value="'.$scores[$term][$exam][$subject].'" /></td></tr>';
								
								}
								
								echo '</tbody></table>';
					
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
					
					<?php
					
					}
					
					?>
					
				</div>
				<!-- /.row -->