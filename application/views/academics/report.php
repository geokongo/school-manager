				<!-- row -->
				<div class="row">
						<?php 
							if(!isset($resultsArray))
							{
								?><!-- first column -->
								<div class="col-lg-6"><?php

								
								echo '<p class="lead">Select Reports to View below</p>';
								
								echo form_open('academics/reports');
								echo form_hidden('actionf', '');
								
								echo form_label('CLASS', 'class');
								echo '<select name="class" id="class" class="form-control" required autofocus >';
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
								
								echo form_label('TERM', 'term');
								echo '<select name="term" id="term" class="form-control" >';
								echo '<option value="TERM1">TERM 1</option>';
								echo '<option value="TERM2">TERM 2</option>';
								echo '<option value="TERM3">TERM 3</option>';
								echo '</select><p><p>';
								
								echo form_label('YEAR', 'year');
								echo '<select name="year" id="year" class="form-control">';
								echo '<option value="2014">2014</option>';
								echo '</select><p><p>';
								
								echo form_submit('submit', 'Procede', 'class="btn btn-lg btn-primary"');
								
								echo '</div>';
							}
							
							if(isset($resultsArray))
							{
								?><style> div.singleReport { page-break-after : always; page-break-before : always; }
									table td { font-size: 13px; } </style>  <?php
								
								foreach($resultsArray as $admissionNumber => $moreInfo)
								{
									echo '<div class="singleReport col-lg-10">';
									
									$pos = array_search($moreInfo['marks'][$year][$term]['AVG']['TOTAL'], $totalAverageScores) + 1 ;
									
									
									echo '<p style="text-align: center;" class="lead">'.$this->session->userdata('client_name').'<br />';
									echo $this->session->userdata('p_address').'</p>';
									echo '<p class="lead" style="text-align: center;"> END OF '.$term.' '.$year.' REPORT <br />';
									echo 'NAME '.$moreInfo['f_name'].' '.$moreInfo['l_name'].' ADM NO. '.$admissionNumber.' '.$class.' '.$moreInfo['stream'].' </p>';
									
									echo '<table class="table table-condensed table-bordered table-hover">';
									echo '<tr><td style="width:35%;">SUBJECT</td><td style="width:10%;">TEST 1</td><td style="width:10%;">TEST 2</td><td style="width:10%;">TEST 3</td><td style="width:10%;">AVG</td><td style="width:10%;">GRADE</td><td style="width:15%;">REMARKS</td></tr>';
									echo '<tr><td>ENGLISH LANGUAGE</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST1']['LANG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST2']['LANG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST3']['LANG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['LANG'].'</td><td></td><td></td></tr>';
									echo '<tr><td>ENGLISH COMPOSITION</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST1']['COMP'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST2']['COMP'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST3']['COMP'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['COMP'].'</td><td></td><td></td></tr>';
									echo '<tr><td style="text-align:right;">%</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST1']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST2']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['TEST3']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE']).'</td><td>'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE']).'</td></tr>';
									echo '<tr><td>KISWAHILI LUGHA</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST1']['LUG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST2']['LUG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST3']['LUG'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['LUG'].'</td><td></td><td></td></tr>';
									echo '<tr><td>KISWAHILI INSHA</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST1']['INS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST2']['INS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST3']['INS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['INS'].'</td><td></td><td></td></tr>';
									echo '<tr><td style="text-align:right;">%</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST1']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST2']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['TEST3']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE']).'</td><td>'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE']).'</td></tr>';
									echo '<tr><td>MATHEMATICS</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['TEST1'].'</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['TEST2'].'</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['TEST3'].'</td><td>'.@$moreInfo['marks'][$year][$term]['MATHS']['AVG'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['MATHS']['AVG']).'</td><td>'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['MATHS']['AVG']).'</td></tr>';
									echo '<tr><td>SOCIAL STUDIES</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST1']['SST'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST2']['SST'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST3']['SST'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['SST'].'</td><td></td><td></td></tr>';
									echo '<tr><td>C . R . E .</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST1']['CRE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST2']['CRE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST3']['CRE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['CRE'].'</td><td></td><td></td></tr>';
									echo '<tr><td style="text-align:right;">%</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST1']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST2']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['TEST3']['PERCENTAGE'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE']).'</td><td>'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE']).'</td></tr>';
									echo '<tr><td>SCIENCE</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['TEST1'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['TEST2'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['TEST3'].'</td><td>'.@$moreInfo['marks'][$year][$term]['SCIENCE']['AVG'].'</td><td>'.@$this->grading->getGrade($moreInfo['marks'][$year][$term]['SCIENCE']['AVG']).'</td><td>'.@$this->grading->getRemarks($moreInfo['marks'][$year][$term]['SCIENCE']['AVG']).'</td></tr>';
									echo '<tr></tr>';
									echo '<tr><td>TOTAL </td><td>'.@$moreInfo['marks'][$year][$term]['TEST1']['TOTAL'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST2']['TOTAL'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST3']['TOTAL'].'</td><td>'.@$moreInfo['marks'][$year][$term]['AVG']['TOTAL'].'</td><td></td><td></td></tr>';
									echo '<tr><td>OUT OF </td><td>500</td><td>500</td><td>500</td><td>500</td><td></td><td></td></tr>';
									echo '<tr><td>CLASS POSITION </td><td>'.@$moreInfo['marks'][$year][$term]['TEST1']['POS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST2']['POS'].'</td><td>'.@$moreInfo['marks'][$year][$term]['TEST3']['POS'].'</td><td>'.@$pos.'</td><td></td><td></td></tr>';
									echo '<tr><td>OUT OF </td><td>'.@$noOfStudents.'</td><td>'.@$noOfStudents.'</td><td>'.@$noOfStudents.'</td><td>'.@$noOfStudents.'</td><td></td><td></td></tr>';
									echo '</table>';
									
									echo '<p> CLASS TEACHER\'S REMARKS <br />
									...........................................................................................................................................................
									............................................................................................................................................................</p>';
									echo '<p>HEAD TEACHER\'S REMARKS <br />
									.............................................................................................................................................................
									.............................................................................................................................................................</p>';
									echo '<p> PARENT/GUARDIAN SIGN.....................DATE.....................REMARKS................................................</p>';
									echo '<p>CLOSING DATE ...................................NEXT TERM OPENS ON.........................................................</p>';
									
									
									echo '</div>';
								
								}
							
							}
