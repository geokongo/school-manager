				<!-- row -->
				<div class="row">
						<?php 
							if(!isset($resultsArray))
							{
								?><!-- first column -->
								<div class="col-lg-6"><?php

								
								echo '<p class="lead">Select Spreadsheet View below</p>';
								
								echo form_open('academics/spreadsheets');
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
								
								
								
								
								echo '<div class="col-lg-12">';?><script>	$(document).ready(function() { $(".spreadSheetTable").tablesorter(); }); </script>
								<style> table td { font-size: 12px; } </style>  <?php
								echo '<p class="lead">'.$class.' '.$term.' '.$year.' Spreadsheet</p>';
								
								echo '<table class="table table-hover table-condensed table-bordered spreadSheetTable">';
								
								echo '<thead><tr><td style="width : 4%;">ADM</td><td style="width : 44%;">NAME</td><th style="width : 4%; ">LAN</th><th style="width : 4%; ">COM</th><th style="width : 4%; " class="success" >%</th><th style="width : 4%; ">LUG</th><th style="width : 4%; ">INS</th><th style="width : 4%; " class="success">%</th><th style="width : 4%; ">SST</th><th style="width : 4%; ">CRE</th><th style="width : 4%; " class="success">%</th><th style="width : 4%; " class="success">MAT</th><th style="width : 4%; " class="success">SCI</th><th style="width : 4%; ">TOT</th><th style="width : 4%; ">POS</th></tr></thead>';
								echo '<tbody>';
								
								foreach($resultsArray as $admissionNumber => $moreInfo)
								{
									$pos = array_search($moreInfo['marks'][$year][$term]['AVG']['TOTAL'], $totalAverageScores) + 1 ;
									echo '<tr><td>'.$admissionNumber.'</td><td>'.$moreInfo['f_name'].' '.$moreInfo['l_name'].'</td><td>'.$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['LANG'].'</td><td>'.$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['COMP'].'</td><td>'.$moreInfo['marks'][$year][$term]['ENGLISH']['AVG']['PERCENTAGE'].'</td><td>'.$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['LUG'].'</td><td>'.$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['INS'].'</td><td>'.$moreInfo['marks'][$year][$term]['KISWAHILI']['AVG']['PERCENTAGE'].'</td><td>'.$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['SST'].'</td><td>'.$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['CRE'].'</td><td>'.$moreInfo['marks'][$year][$term]['SOCIALSTUDIES']['AVG']['PERCENTAGE'].'	</td><td>'.$moreInfo['marks'][$year][$term]['MATHS']['AVG'].'</td><td>'.$moreInfo['marks'][$year][$term]['SCIENCE']['AVG'].'</td><td>'.$moreInfo['marks'][$year][$term]['AVG']['TOTAL'].'</td><td>'.$pos.'</td></tr>';
								
								}
								
								echo '</tbody></table>';
								
								echo '</div>';
								
								
								
							}
						?>
				</div>
				<!-- close row -->