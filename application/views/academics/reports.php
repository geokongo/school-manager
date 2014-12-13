				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-10-->
					<div class="col-lg-11">
						<?php 
						
							if(isset($error_message)) 
							{	
								echo '<div class="col-lg-10">';
								echo '<p class="lead">PRINT REPORTS</p>';
								echo '<p class="lead">Choose the Reports to Print </p>';
								echo $error_message; 
								echo '</div>';
							}
							
							if(isset($selectOptions)) //the selections have not yet been made so display the selection form
							{
								echo '<div class="col-lg-6">';
								echo '<p class="lead">PRINT REPORTS</p>';
								echo '<p class="lead">Choose the Reports to Print </p>';
								
								if(empty($classes_options))
								{
									echo '<p class="alert alert-danger">No registered classes yet</p>';
								
								}
								else
								{
									echo form_open('academics/reports');
									echo form_hidden('actionf', 'get_result_set');
									echo form_label('Class', 'class');
									
									echo '<select name="class" id="class" class="form-control" required="required">';
									foreach($classes_options->result() as $row)
									{
										echo '<option value="'.$row->class.'">'.strtoupper($row->class).'</option>';
									
									}
									
									echo '</select><p><p>';
								
									
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
								
								echo '</div>';
							}
							if(isset($resultSet))
							{
								
								$resultArray = $resultSet[0];
								$metaData = $resultSet[1];
								
								//set page break style
								echo '<style type="text/css"> div.individualReport { page-break-after : always; page-break-before : always; } </style>';
								
								//set javascript to invoke print
								echo '<script type="text/javascript"> $(document).ready(function() { window.print(); }); </script>';
								
								foreach($resultArray as $admNumber => $moreInfo)
								{
									echo '<div class="individualReport">';
									echo '<!-- report header --><div class="col-lg-10">';
									echo '<p class="lead" style="text-align : center; ">'.strtoupper($this->session->userdata('client_name')).'<br />';
									echo strtoupper($this->session->userdata('p_address')).' - '.$this->session->userdata('p_code').'<br />';
									echo strtoupper($this->session->userdata('city')).'</p>';
									//echo '<p class="" style="text-align : left; ">Tel : <em><a href="">'.$this->session->userdata('phone').'</a></em><br /> Email : <em><a href="">'.$this->session->userdata('email').'</a></em></p></p>';
									echo '<p class="lead" style="text-align : center; ">END OF <u>'.strtoupper($term).'</u> <u> '.$year.'</u> REPORT</p>';
									echo '<p class="" style="text-align : center; font-size : 17px;  "> NAME : <u>'.strtoupper($moreInfo['name']).'</u> ADMISSION NUMBER : <u>'.$admNumber.'</u></p><p class="" style="text-align : center; font-size : 17px; "> CLASS : <u>'.strtoupper($class).'</u> STREAM : <u>'.strtoupper($moreInfo['stream']).'</u> AVERAGE GRADE : <u>'.$moreInfo['avgGrade'].'</u> </p>';
									echo '</div><!-- close report header -->';
									
									echo '<!-- report body --><div class="col-lg-10">';
									$subjectsArray = $metaData['subjectsArray'];
									$examsArray = $metaData['examsArray'];
									
									echo '<table class="table table-bordered table-hover table-responsive"><tr><td  style="width : 40%; ">SUBJECT</td>';
									foreach($examsArray as $examIndex => $examName) { echo '<td>'.strtoupper($examName).'</td>'; }
									echo '<td>AVG</td><td>GRADE</td><td>REMARKS</td></tr>';
									
									foreach($subjectsArray as $subjectIndex => $subjectName)
									{
										echo '<tr><td>'.strtoupper($subjectName).'</td>';
										foreach($examsArray as $examIndex => $examName) 
										{ 
											if(isset($moreInfo[$subjectName][$examName]))
											{
												echo '<td>'.$moreInfo[$subjectName][$examName].'</td>'; 
												
											}
											else { echo '<td>&nbsp</td>'; }
											
										}
										
										if(isset($moreInfo[$subjectName]['avg'])) { echo '<td>'.$moreInfo[$subjectName]['avg'].'</td>'; } else { echo '<td>&nbsp</td>'; }
										if(isset($moreInfo[$subjectName]['grade'])) { echo '<td>'.strtoupper($moreInfo[$subjectName]['grade']).'</td>'; } else { echo '<td>&nbsp</td>'; }
										if(isset($moreInfo[$subjectName]['remarks'])) { echo '<td>'.strtoupper($moreInfo[$subjectName]['remarks']).'</td></tr>'; } else { echo '<td>&nbsp</td></tr>'; }
									
									}
									
									$colspan = count($examsArray) + 1;
									
									echo '<tr><td colspan="'.$colspan.'" style="text-align : right; ">TOTAL</td><td>'.$moreInfo['total'].'</td><td>Out Of </td><td>'.$moreInfo['outOf'].'</td></tr>';
									echo '<tr><td colspan="'.$colspan.'" style="text-align : right; ">POSITION</td><td>'.$moreInfo['pos'].'</td><td>Out Of </td><td>'.$metaData['numberOfStudents'].'</td></tr>';
									echo '</table>';
									echo '</div><!-- close report body -->';
									
									echo '<!-- report footer --><div class="col-lg-10">';
									echo '<p >CLASS TEACHER\'S REMARKS </p><p>
									.......................................................................................................................................................
									.......................................................................................................................................................</p>';
									echo '<p >HEAD TEACHER\'S REMARKS 
									.......................................................................................................................................................
									.......................................................................................................................................................<br />
									Closing Date'.strtoupper($metaData['dateOfPreparation']).'..................................................................</p>';
									echo '<p >PARENT/GUARDIAN  
									SIGN ..................................................................................................................................................
									DATE.................................................... REMARKS.....................................................................</p><hr />';
									echo '</div><!-- close report footer -->';
									echo '</div><!-- close individualReport -->';
									
									
									
								}
							
							}
					
						?>
					
					</div>
					<!-- /.first-column -->
				</div>
				<!-- /.row -->