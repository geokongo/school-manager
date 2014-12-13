				<!-- row -->
				<div class="row">
					<!-- column 1 -->
					<div class="col-lg-6">
						<p class="lead">All Student Records</p>
						<script>	$(document).ready(function() { $(".allRecordsTable").tablesorter(); }); </script>
						<?php 
						if(isset($studentRecords))
						{
							foreach($classesArray as $classKey => $className)
							{
								echo '<p class="lead">'.strtoupper(stripslashes($className)).'</p>';
								echo '<table class="table table-hover tablesorter allRecordsTable headerSortUp" >';
								echo '<thead><tr><th style="width : 20%; ">ADM</th><th style="width : 60%; ">Name</th></tr></thead>';
								echo '<tbody>';
								
								foreach($studentRecords->result() as $studentRecord)
								{
									if($studentRecord->coa == $classKey)
									{
										echo '<tr><td>'.stripslashes($studentRecord->adm).'</td><td>'.strtoupper(stripslashes($studentRecord->f_name)).' '.strtoupper(stripslashes($studentRecord->m_name)).' '.strtoupper(stripslashes($studentRecord->l_name)).'</td></tr>';
									
									}
								
								}
								
								echo '</tbody>';
								echo '</table>';
							
							}
							
						}
						?>
					</div>
					<!-- /.column 1 -->
				</div>
				<!-- /.row -->