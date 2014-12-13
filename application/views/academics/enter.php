				<!-- row -->
				<div class="row">
						<?php 
							if(!isset($studentRecords))
							{
								?><!-- first column -->
								<div class="col-lg-6"><?php

								
								echo '<p class="lead">Select the Marks to Enter below</p>';
								
								echo form_open('academics/enter_marks');
								echo form_hidden('actionf', 'chooseOptions');
								
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
								
								?></div>
								<!-- close first column --><?php

							
							}
							
							if(isset($studentRecords))
							{
								?><!-- second column -->
								<div class="col-lg-12"><style> input :focus { box-shadow : 1px } </style><?php
									
								$spreadsheetObject = $spreadsheetArray->row();
								$spreadsheet = @unserialize(stripslashes($spreadsheetObject->spreadsheet));
								
								
								echo '<p class="lead" style="text-align : center; ">'.$this->session->userdata('client_name').'<br />';
								echo 'PROGRESS RECORD ';
								echo 'TERM : '.$term.' CLASS : '.$class.'<br />';
								echo 'EXAM : '.$exam.' YEAR : '.$year.' </p>';
								
								
								echo '<table class="table table-hover table-condensed table-responsive col-lg-12" >';
								echo '<thead><tr><th style="width : 4%;">ADM</th><th>NAME</th><th style="width : 6%;">LANG</th><th style="width : 6%; ">COMP</th><th style="width : 6%; " class="success" >%</th><th style="width : 6%; ">LUGH</th><th style="width : 6%; ">INSH</th><th style="width : 6%; " class="success">%</th><th style="width : 6%; ">SST</th><th style="width : 6%; ">CRE</th><th style="width : 6%; " class="success">%</th><th style="width : 6%; " class="success">MAT</th><th style="width : 6%; " class="success">SCI</th><th style="width : 6%; ">TOTAL</th><th style="width : 6%; ">POS</th></tr></thead>';
								echo '<tbody>';
								
								echo form_open('academics/enter_marks');
								echo form_hidden('actionf', 'enter_marks');
								echo form_hidden('class', $class);
								echo form_hidden('exam', $exam);
								echo form_hidden('year', $year);
								echo form_hidden('term', $term);
								
								
								foreach($studentRecords->result() as $studentRecord)
								{
									foreach($examsArray->result() as $examArray)
									{	if($examArray->adm == $studentRecord->adm)
										{
											$exams = unserialize(stripslashes($examArray->exams));
										}
									
									}
									
									echo '<tr><td style="width : 4%; ">'.$studentRecord->adm.'</td><td>'.strtoupper(stripslashes($studentRecord->f_name)).' '.strtoupper(substr(stripslashes($studentRecord->m_name), 0, 1)).'. '.strtoupper(stripslashes($studentRecord->l_name)).'</td><td><input name="'.stripslashes($studentRecord->adm).'['.$year.']['.$term.'][ENGLISH]['.$exam.'][LANG]" value="'.@$exams[$year][$term]['ENGLISH'][$exam]['LANG'].'" id="'.$studentRecord->adm.'" class="englishLANG '.$studentRecord->adm.'englishLANG" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][ENGLISH]['.$exam.'][COMP]" value="'.@$exams[$year][$term]['ENGLISH'][$exam]['COMP'].'" id="'.$studentRecord->adm.'" class="englishCOMP '.$studentRecord->adm.'englishCOMP" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][ENGLISH]['.$exam.'][PERCENTAGE]" value="'.@$exams[$year][$term]['ENGLISH'][$exam]['PERCENTAGE'].'" class="'.$studentRecord->adm.'english english " style="width : 100%;" id="'.$studentRecord->adm.'"/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][KISWAHILI]['.$exam.'][LUG]" id="'.$studentRecord->adm.'" value="'.@$exams[$year][$term]['KISWAHILI'][$exam]['LUG'].'" class="kiswahiliLUG '.$studentRecord->adm.'kiswahiliLUG" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][KISWAHILI]['.$exam.'][INS]" value="'.@$exams[$year][$term]['KISWAHILI'][$exam]['INS'].'" id="'.$studentRecord->adm.'" class="kiswahiliINS '.$studentRecord->adm.'kiswahiliINS" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][KISWAHILI]['.$exam.'][PERCENTAGE]" value="'.@$exams[$year][$term]['KISWAHILI'][$exam]['PERCENTAGE'].'" id="'.$studentRecord->adm.'" class="'.$studentRecord->adm.'kiswahili kiswahili"style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][SOCIALSTUDIES]['.$exam.'][SST]" value="'.@$exams[$year][$term]['SOCIALSTUDIES'][$exam]['SST'].'" id="'.$studentRecord->adm.'" class="socialStudiesSST '.$studentRecord->adm.'socialStudiesSST" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][SOCIALSTUDIES]['.$exam.'][CRE]" value="'.@$exams[$year][$term]['SOCIALSTUDIES'][$exam]['CRE'].'" id="'.$studentRecord->adm.'" class="socialStudiesCRE '.$studentRecord->adm.'socialStudiesCRE" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][SOCIALSTUDIES]['.$exam.'][PERCENTAGE]" value="'.@$exams[$year][$term]['SOCIALSTUDIES'][$exam]['PERCENTAGE'].'" id="'.$studentRecord->adm.'" class="'.$studentRecord->adm.'socialStudies socialStudies" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][MATHS]['.$exam.']" value="'.@$exams[$year][$term]['MATHS'][$exam].'" id="'.$studentRecord->adm.'" class="maths '.$studentRecord->adm.'maths" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.'][SCIENCE]['.$exam.']" value="'.@$exams[$year][$term]['SCIENCE'][$exam].'" id="'.$studentRecord->adm.'" class="science '.$studentRecord->adm.'science" style="width : 100%; "/></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.']['.$exam.'][TOTAL]" value="'.@$exams[$year][$term][$exam]['TOTAL'].'" style="width : 100%;" id="'.$studentRecord->adm.'" class="'.$studentRecord->adm.'Total total" /></td><td><input name="'.$studentRecord->adm.'['.$year.']['.$term.']['.$exam.'][POS]" value="'.@$exams[$year][$term][$exam]['POS'].'" id="'.$studentRecord->adm.'Pos" style="width : 100%; "/></td><tr>';
									
								}
								echo '<tr><td></td><td>TOTAL MARKS</td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][ENGLISH][TOTALMARKS]"  value="'.@$spreadsheet[$year][$term][$exam]['ENGLISH']['TOTALMARKS'].'" id="englishTotal" style="width : 100%; "/></td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][KISWAHILI][TOTALMARKS]" value="'.@$spreadsheet[$year][$term][$exam]['KISWAHILI']['TOTALMARKS'].'" id="kiswahiliTotal"style="width : 100%; "/></td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][SOCIALSTUDIES][TOTALMARKS]" value="'.@$spreadsheet[$year][$term][$exam]['SOCIALSTUDIES']['TOTALMARKS'].'" id="socialStudiesTotal"style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][MATHS][TOTALMARKS]" value="'.@$spreadsheet[$year][$term][$exam]['MATHS']['TOTALMARKS'].'" id="mathsTotal"style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][SCIENCE][TOTALMARKS]" value="'.@$spreadsheet[$year][$term][$exam]['SCIENCE']['TOTALMARKS'].'" id="scienceTotal"style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][TOTALMARKS]" value="'.@$spreadsheet[$year][$term][$exam]['TOTALMARKS'].'" id="total"style="width : 100%; "/></td><td></td><tr>';
								echo '<tr><td></td><td>MEAN SCORE</td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][ENGLISH][MEANSCORE]"  value="'.@$spreadsheet[$year][$term][$exam]['ENGLISH']['MEANSCORE'].'"  id="englishMeanScore" style="width : 100%; "/></td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][KISWAHILI][MEANSCORE]" value="'.@$spreadsheet[$year][$term][$exam]['KISWAHILI']['MEANSCORE'].'" id="kiswahiliMeanScore"style="width : 100%; "/></td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][SOCIALSTUDIES][MEANSCORE]" value="'.@$spreadsheet[$year][$term][$exam]['SOCIALSTUDIES']['MEANSCORE'].'" id="socialStudiesMeanScore"style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][MATHS][MEANSCORE]" value="'.@$spreadsheet[$year][$term][$exam]['MATHS']['MEANSCORE'].'" id="mathsMeanScore"style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][SCIENCE][MEANSCORE]" value="'.@$spreadsheet[$year][$term][$exam]['SCIENCE']['MEANSCORE'].'" id="scienceMeanScore"style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][MEANSCORE]" value="'.@$spreadsheet[$year][$term][$exam]['MEANSCORE'].'" id="meanScore"style="width : 100%; "/></td><td></td><tr>';
								echo '<tr><td></td><td>SUBJECT POSITION</td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][ENGLISH][POSITION]"  value="'.@$spreadsheet[$year][$term][$exam]['ENGLISH']['POSITION'].'"  id="englishPosition"style="width : 100%; "/></td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][KISWAHILI][POSITION]" value="'.@$spreadsheet[$year][$term][$exam]['KISWAHILI']['POSITION'].'" id="kiswahiliPosition" style="width : 100%; "/></td><td></td><td></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][SOCIALSTUDIES][POSITION]" value="'.@$spreadsheet[$year][$term][$exam]['SOCIALSTUDIES']['POSITION'].'" id="socialStudiesPosition" style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][MATHEMATICS][POSITION]" value="'.@$spreadsheet[$year][$term][$exam]['MATHEMATICS']['POSITION'].'" id="mathsPosition" style="width : 100%; "/></td><td><input name="exams['.$year.']['.$term.']['.$exam.'][SCIENCE][POSITION]" value="'.@$spreadsheet[$year][$term][$exam]['SCIENCE']['POSITION'].'" id="sciencePosition" style="width : 100%; "/></td><td></td><td></td><td></td><tr>';
								echo '</tbody></table>';
								
								echo form_submit('submit', 'Save', 'class="btn btn-lg btn-primary"');
								?><!-- close second column -->
								</div><?php

							
							}
						
						?>
				</div>
				<!-- close row -->
				