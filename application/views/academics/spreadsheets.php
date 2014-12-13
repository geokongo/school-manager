				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-6 -->
					<div class="col-lg-6">
						<?php 
						
							if(isset($error_message)) 
							{	
								
								echo '<p class="lead">GENERATE SPREADSHEETS</p>';
								echo '<p class="lead">Choose the Spreadsheet to Generate </p>';
								echo $error_message; 
							}
							
							if(isset($selectOptions)) //the selections have not yet been made so display the selection form
							{
								echo '<p class="lead">GENERATE SPREADSHEETS</p>';
								echo '<p class="lead">Choose the Spreadsheet to Generate </p>';
								
								if(empty($classes_options))
								{
									echo '<p class="alert alert-danger">No registered classes yet</p>';
								
								}
								else
								{
									echo form_open('academics/spreadsheets');
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
							
							}
					echo '</div><!-- /first column -->';
					echo '<!-- column 2 -->';
					echo '<div class="col-lg-11">';
							if(isset($resultSet))
							{
								?> <script>	$(document).ready(function() { $(".spreadSheetTable").tablesorter(); }); </script>
								<?php 
								echo '<div class="analysis">';

								echo '<p class="lead">'.strtoupper($class).' '.strtoupper($term).' '.$year.' SPREADSHEET</p><style> div.analysis { font-size : 14px; } table > tbody > tr > td { cell-padding : 0; border-spacing : 0px; cell-spacing : 0px;  }</style>';
								
								$spreadsheetResultSet = $resultSet[0];
								$overalRanking = $resultSet[1];
								$subjectsArray = $resultSet[2];
								$subjectRanking = $resultSet[3];
								
								$count = count($subjectsArray);
								
								echo '<table class="table table-bordered table-hover col-lg-10 tablesorter spreadSheetTable table-condensed table-responsive" >';
								echo '<thead><tr><th class="header">ADM</th><th style="width : 25%; ">NAME</th>';
								
								foreach($subjectsArray as $subjectIndex => $subjectName)
								{
									echo '<th>'.strtoupper(substr($subjectName, 0, 3)).'</th>';
								
								}
								
								echo '<th>TOTAL</th><th>GRADE</th><th>STREAM</th><th>POS</th><tr></thead>';
								echo '<tbody>';
								foreach($spreadsheetResultSet as $admissionNumber => $moreInfo)
								{
									echo '<tr><td>'.$admissionNumber.'</td><td style="width : 30%; ">'.strtoupper(stripslashes($moreInfo['name'])).'</td>';
								
									foreach($subjectsArray as $subjectIndex => $subjectName)
									{
										echo '<td>'.strtoupper($moreInfo[$subjectName]).'</td>';
									
									}
									
									echo '<td>'.$moreInfo['total'].'</td><td>'.strtoupper($moreInfo['grade']).'</td><td>'.strtoupper($moreInfo['stream']).'</td>';
									$position = array_search($moreInfo['total'], $overalRanking) + 1;
									echo '<td>'.$position.'</td></tr>';
									
								}
								echo '</tbody></table>';
								
								echo '<p class="lead">Top Five Overall</p>';
								
								
								echo '<div class="col-lg-6">';
								echo '<table class="table table-bordered table-hover col-lg-4 table-condensed"><thead><tr><th>ADM</th><th>NAME</th><th>STREAM</th><th>TOTAL</th><th>POS</th></tr></thead></tbody>';
								for($numberOfPositions = 0; $numberOfPositions < 5; $numberOfPositions++)
								{
								
									foreach($spreadsheetResultSet as $admissionNumber => $moreInfo)
									{
										if($moreInfo['total'] == $overalRanking[$numberOfPositions])
										{
											echo '<td>'.$admissionNumber.'</td><td>'.strtoupper($moreInfo['name']).'</td><td>'.$moreInfo['stream'].'</td><td>'.$moreInfo['total'].'</td>';
											$position = $numberOfPositions + 1;
											echo '<td>'.$position.'</td></tr>';
										
										}
									
									}
								
								}
								echo '</tbody></table>';
								echo '</div>';
								
								
								echo '<p class="lead">Best 3 per Subject</p>';
								
								foreach($subjectsArray as $subjectIndex => $subjectName)
								{
									echo '<div class="col-lg-6">';
									echo '<p>'.strtoupper($subjectName).'</p>';
									
									$subjectScoresArray = $subjectRanking[$subjectName];
									array_multisort($subjectScoresArray, SORT_DESC);
									$subjectScoresArray = array_chunk($subjectScoresArray,3);
									$subjectScoresArray = $subjectScoresArray[0];
									
									echo '<table class="table table-bordered table-hover table-condensed"><thead><tr><th>ADM</th><th>NAME</th><th>STREAM</th><th>SCORE</th><th>POS</th></tr></thead><tbody>';
									
									foreach($subjectScoresArray as $subjectPosition => $subjectScore)
									{
										foreach($spreadsheetResultSet as $admissionNumber => $moreInfo)
										{
											
											if(isset($moreInfo[$subjectName]))
											{
												if($moreInfo[$subjectName] == $subjectScore)
												{
													$position = $subjectPosition + 1;
													echo '<tr><td>'.$admissionNumber.'</td><td>'.strtoupper($moreInfo['name']).'</td><td>'.strtoupper($moreInfo['stream']).'</td><td>'.$subjectScore.'</td><td>'.$position.'</td></tr>';
													$position++;
													
												}
											
											}
											
											
										}
										
									}
									
									echo '</tbody></table>';
									echo '</div>';
								}
								
								echo '</div>';
								
							}
					
						?>
					
					</div>
					<!-- /.first-column -->
				</div>
				<!-- /.row -->