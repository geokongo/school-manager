				<!-- row -->
				<div class="row">
						<?php 
							if(!isset($studentRecords))
							{
								?><!-- first column -->
								<div class="col-lg-6"><?php

								
								echo '<p class="lead">Select the Marks to View below</p>';
								
								echo form_open('academics/enter_marks');
								echo form_hidden('actionf', 'get_marks');
								
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
								
								echo form_label('EXAM', 'exam');
								echo '<select class="form-control" name="exam" id="exam" required>';
								echo '<option value="TEST1">TEST 1</option>';
								echo '<option value="TEST2">TEST 2</option>';
								echo '<option value="TEST3">TEST 3</option>';
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
							if(isset($studentRecords))
							{
								echo '<div class="col-lg-12">';
								
								echo '<p class="lead" style="text-align : center; ">'.$this->session->userdata('client_name').'<br />';
								echo 'PROGRESS RECORD ';
								echo 'TERM : '.$term.' CLASS : '.$class.'<br />';
								echo 'EXAM : '.$exam.' YEAR : '.$year.' </p>';
								
								if($studentRecords->num_rows() < 1)
								{
									echo '<p class="alert alert-danger"> There are no marks entered yet</p>';
								
								}
								else
								{
								?> <script>	$(document).ready(function() { $(".progressRecordTable").tablesorter(); }); </script>
								<style> table th, td { font-size : 12px; cell-padding : 0px; } </style>
								<?php 
									echo '<div class="table-responsive">';
									
									echo '<table  class="progressRecordTable table table-bordered table-hover table-condensed table-responsive col-lg-12" >';
									echo '<thead><tr><th style="width : 4%;">ADM</th><th style="width : 44%;">NAME</th><th style="width : 4%; ">LAN</th><th style="width : 4%; ">COM</th><th style="width : 4%; " class="success" >%</th><th style="width : 4%; ">LUG</th><th style="width : 4%; ">INS</th><th style="width : 4%; " class="success">%</th><th style="width : 4%; ">SST</th><th style="width : 4%; ">CRE</th><th style="width : 4%; " class="success">%</th><th style="width : 4%; " class="success">MAT</th><th style="width : 4%; " class="success">SCI</th><th style="width : 4%; ">TOT</th><th style="width : 4%; ">POS</th></tr></thead>';
									echo '<tbody>';
									
									$spreadsheetObject = $spreadsheetArray->row();
									$spreadsheet = unserialize(stripslashes($spreadsheetObject->spreadsheet));
									
									foreach($studentRecords->result() as $studentRecord)
									{
										$exams = unserialize(stripslashes($studentRecord->exams));
										
										echo '<tr><td style="width : 4%; ">'.$studentRecord->adm.'</td><td>'.strtoupper(stripslashes($studentRecord->f_name)).' '.strtoupper(substr(stripslashes($studentRecord->m_name), 0, 1)).'. '.strtoupper(stripslashes($studentRecord->l_name)).'</td><td>'.@$exams[$year][$term]['ENGLISH'][$exam]['LANG'].'</td><td>'.@$exams[$year][$term]['ENGLISH'][$exam]['COMP'].'</td><td class="success">'.@$exams[$year][$term]['ENGLISH'][$exam]['PERCENTAGE'].'</td><td>'.@$exams[$year][$term]['KISWAHILI'][$exam]['LUG'].'</td><td>'.@$exams[$year][$term]['KISWAHILI'][$exam]['INS'].'</td><td class="success">'.@$exams[$year][$term]['KISWAHILI'][$exam]['PERCENTAGE'].'</td><td>'.@$exams[$year][$term]['SOCIALSTUDIES'][$exam]['SST'].'</td><td>'.@$exams[$year][$term]['SOCIALSTUDIES'][$exam]['CRE'].'</td><td class="success">'.@$exams[$year][$term]['SOCIALSTUDIES'][$exam]['PERCENTAGE'].'</td><td class="success">'.@$exams[$year][$term]['MATHS'][$exam].'</td><td class="success">'.@$exams[$year][$term]['SCIENCE'][$exam].'</td><td>'.@$exams[$year][$term][$exam]['TOTAL'].'</td><td>'.@$exams[$year][$term][$exam]['POS'].'</td><tr>';
									
									}
									
									echo '</tbody></table>';
									
									echo '<table class=" table table-bordered table-hover table-condensed table-responsive col-lg-12" >';
									echo '<tr><td style="width : 4%;"></td><td  style="width : 44%;">TOTAL MARKS</td><td style="width : 4%;"></td><td style="width : 4%;"></td><td style="width : 4%;">'.@$spreadsheet[$year][$term][$exam]['ENGLISH']['TOTALMARKS'].'</td><td style="width : 4%;"></td><td style="width : 4%;"></td><td style="width : 4%;">'.@$spreadsheet[$year][$term][$exam]['KISWAHILI']['TOTALMARKS'].'</td><td style="width : 4%;"></td><td style="width : 4%;"></td><td style="width : 4%;">'.@$spreadsheet[$year][$term][$exam]['SOCIALSTUDIES']['TOTALMARKS'].'</td><td style="width : 4%;">'.@$spreadsheet[$year][$term][$exam]['MATHS']['TOTALMARKS'].'</td><td style="width : 4%;">'.@$spreadsheet[$year][$term][$exam]['SCIENCE']['TOTALMARKS'].'</td><td style="width : 4%;">'.@$spreadsheet[$year][$term][$exam]['TOTALMARKS'].'</td><td style="width : 4%;"></td><tr>';
									echo '<tr><td></td><td>MEAN SCORE</td><td></td><td></td><td>'.@$spreadsheet[$year][$term][$exam]['ENGLISH']['MEANSCORE'].'</td><td></td><td></td><td>'.@$spreadsheet[$year][$term][$exam]['KISWAHILI']['MEANSCORE'].'</td><td></td><td></td><td>'.@$spreadsheet[$year][$term][$exam]['SOCIALSTUDIES']['MEANSCORE'].'</td><td>'.@$spreadsheet[$year][$term][$exam]['MATHS']['MEANSCORE'].'</td><td>'.@$spreadsheet[$year][$term][$exam]['SCIENCE']['MEANSCORE'].'</td><td>'.@$spreadsheet[$year][$term][$exam]['MEANSCORE'].'</td><td></td><tr>';
									echo '<tr><td></td><td>SUBJECT POSITION</td><td></td><td></td><td>'.@$spreadsheet[$year][$term][$exam]['ENGLISH']['POSITION'].'</td><td></td><td></td><td>'.@$spreadsheet[$year][$term][$exam]['KISWAHILI']['POSITION'].'</td><td></td><td></td><td>'.@$spreadsheet[$year][$term][$exam]['SOCIALSTUDIES']['POSITION'].'</td><td>'.@$spreadsheet[$year][$term][$exam]['MATHEMATICS']['POSITION'].'</td><td>'.@$spreadsheet[$year][$term][$exam]['SCIENCE']['POSITION'].'</td><td></td><td></td><tr>';
									echo '</table>';
									
									echo '</div>';
								}
								
								echo '</div>';
							}
							
						?>
					</div>
					<!-- close first column -->
				</div>
				<!-- close row -->
