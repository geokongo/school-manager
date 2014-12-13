				<!-- first row -->
				<div class="row">
					<!-- first column -->
					<div class="col-lg-12">
						<?php 
							if(isset($availableClassesObject))
							{
								echo '<div class="col-lg-6">';
								
								if($availableClassesObject->num_rows() < 1) //no classes defined yet
								{
									echo '<p class="alert alert-danger"> There are no registered classes yet! </p>';
								
								}
								else //there are already registered classes
								{
									echo '<p class="lead"> Select a class to get the class list</p>';
									
									echo form_open('academics/class_list');
									echo form_hidden('actionf', 'get_class_list');
									echo form_label('Class', 'class_cl');
									
									echo '<select name="class" id="class_cl" class="form-control" required="required">';
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
										
										echo '<select name="stream" id="stream_cl" class="form-control" required="required">';
										foreach($streamsArray as $streamIndex => $streamName)
										{
											echo '<option value="'.stripslashes($streamName).'">'.strtoupper(stripslashes($streamName)).'</option>';
											
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
										echo '</select><p><p>';
									
									}
									else
									{
										echo '<p class="alert alert-danger">No registered subjects for this stream</p><p><p>';
									
									}
									echo '</div>';
									
									echo '</div>';
								
									echo form_submit('submit', 'Procede', 'class="btn btn-lg btn-primary"');
								
									echo form_close();
								
								}
								
								echo '<div>';
							
							}
							
							if(isset($listOfStudents) AND isset($classOptionsObject))
							{
								echo '<div class="col-lg-10">';
								?><script>	$(document).ready(function() { $(".classListTable").tablesorter(); }); </script><style> div.class_list { font-size : 14px; } </style>'<?php
								echo '<p class="lead">'.strtoupper($this->session->userdata('client_name')).'</p>';
								echo '<p class="lead">'.$class.' '.$stream.' '.$subject.' </p>';
								$classOptions = $classOptionsObject->row();
								
								$examsArray = unserialize(stripslashes($classOptions->exams));
								$examCount = count($examsArray);
								
								echo '<div class="class_list">';
								
								echo '<table class="table table-hover table-bordered classListTable table-condensed table-responsive">';
								echo '<thead><tr><th>ADM</th><th  style="width : 30%; ">NAME</th>';
								
								foreach($examsArray as $examIndex => $examName)
								{
									echo '<th>'.stripslashes($examName).'</th><th>OUT OF</th>';
								
								}
								
								echo '</tr></thead>';
								
								echo '<tbody>';
								foreach($listOfStudents->result() as $studentInfo)
								{
									echo '<tr><td>'.stripslashes($studentInfo->adm).'</td><td>'.stripslashes($studentInfo->f_name).' '.substr($studentInfo->m_name, 0, 1).'. '.stripslashes($studentInfo->l_name).' </td>';
									
									for($itr = 0; $itr < $examCount; $itr++)
									{
										echo '<td>&nbsp</td><td>&nbsp</td>';
									
									}
									echo '</tr>';
									
								}
								
								echo '</tbody>';
								
								echo '</table>';
								
								echo '</div>';
							
							}
						
						?>
					</div>
					<!-- close first column -->
				</div>
				<!-- close first row -->