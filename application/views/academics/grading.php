				<!-- .row -->
				<div class="row">
					<!-- first-column col-lg-6 -->
					<div class="col-lg-6">
						<?php 
							echo '<p class="lead">SET THE GRADING SYSTEM</p>';
						
						if(isset($classes) AND $classes->num_rows() > 0)
						{
							foreach($classes->result() as $row)
							{
								echo '<p class="lead">'.strtoupper($row->class).'</p>';
								
								$grades_array = unserialize($row->grading);
								
								if(empty($grades_array))
								{
									echo '<table class="col-lg-6 table"><tr><thead><th style="width : 10%; ">Grade</th><th style="width : 10%; ">From</th><th style="width : 10%; ">To</th><th style="width : 30%; ">Remarks</th><th style="width : 10%; ">Points</th><th style="width : 10%; ">Edit</th><th style="width : 10%; ">New</th><th style="width : 10%; ">Delete</th></thead></tr>';
									echo '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" data-toggle="modal" data-target="#add_new_'.preg_replace('/\s+/', '_', $row->class).'_grading" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></button></td><td></td></tr>';
									echo '</table>';
									
								}
								else
								{
									$grades = array_keys($grades_array);
									
									echo '<table class="col-lg-6 table"><tr><thead><th style="width : 10%; ">Grade</th><th style="width : 10%; ">From</th><th style="width : 10%; ">To</th><th style="width : 30%; ">Remarks</th><th style="width : 10%; ">Points</th><th style="width : 10%; ">Edit</th><th style="width : 10%; ">New</th><th style="width : 10%; ">Delete</th></thead></tr>';
									
									$count = count($grades);
									
									for($itr = 0; $itr < $count; $itr++)
									{
										$grade = $grades[$itr];
										
										echo '<tr><td>'.$grade.'</td><td>'.$grades_array[$grade]['from'].'</td><td>'.$grades_array[$grade]['to'].'</td><td>'.$grades_array[$grade]['remarks'].'</td><td>'.$grades_array[$grade]['points'].'</td><td><button data-toggle="modal" data-target="#edit_'.preg_replace('/\s+/', '_', $row->class).'_grading" type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-open"></i></button></td><td><button data-toggle="modal" data-target="#add_new_'.preg_replace('/\s+/', '_', $row->class).'_grading" type="button" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></button></td><td><button data-toggle="modal" data-target="#delete_'.preg_replace('/\s+/', '_', $row->class).'_grade_'.preg_replace('/\s+/', '_', $grade).'" type="button" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
										
										
										echo '<div class="modal" id="delete_'.preg_replace('/\s+/', '_', $row->class).'_grade_'.$grade.'" tabindex="-1" role="dialog" aria-hidden="true">';
										echo '<div class="modal-dialog">';
										echo '<div class="modal-content">';
										echo '<div class="modal-header">';
										echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
										echo '<h4 class="modal-title"> Delete '.strtoupper(stripslashes($row->class)).' Grade '.stripslashes($grade).'</h4>';
										echo '</div><!-- /.modal header -->';
										echo '<div class="modal-body col">';
										echo form_open('academics/grading');
										echo form_hidden('actionf', 'delete_grade');
										echo form_hidden('class', stripslashes($row->class));
										echo form_hidden('grade', stripslashes($grade));
										
										echo '<p class="lead">Confirm to Delete</p>';

										echo '</div><!-- /.modal body -->';
										echo '<div class="modal-footer">';
										echo '<button type="button" data-dismiss="modal" class="btn btn-lg btn-primary"><i class="fa fa-times"></i>Cancel</button>';
										echo '<button type="submit" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
										echo form_close();
										echo '</div><!-- /.modal footer -->';
										echo '</div><!-- /.modal content -->';
										echo '</div><!-- /.dialog -->';
										echo '</div><!-- /.modal -->';
										
										
										
									}
									
									echo '</table>';
									
								}
							
							}
						
						}
						
						else
						{
							echo '<p class="alert alert-danger">There are no registered classes yet</p>';
						
						}
						
						?>
					</div>
					<!-- /.first-column -->
				</div>
				<!-- /.row -->
				
				<!-- row 2 -->
				<div class="row" >
				
					<!-- add new class grading modal -->';
					<?php 
					
						if(isset($classes) AND $classes->num_rows() > 0)
						{
							foreach($classes->result() as $row)
							{
								echo '<div class="modal" id="add_new_'.preg_replace('/\s+/', '_', $row->class).'_grading" tabindex="-1" role="dialog" aria-hidden="true">';
								echo '<div class="modal-dialog">';
								echo '<div class="modal-content">';
								echo '<div class="modal-header">';
								echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
								echo '<h4 class="modal-title"> Add New '.strtoupper(stripslashes($row->class)).' Grading</h4>';
								echo '</div><!-- /.modal header -->';
								echo '<div class="modal-body col">';
								echo form_open('academics/grading');
								echo form_hidden('actionf', 'add_new_grading');
								echo form_hidden('class', stripslashes($row->class));
								
								echo form_label('Grade', 'grade');
								$attrib1 = array(
									'name' => 'grade',
									'id' => 'grade',
									'class' => 'form-control',
									'required' => 'required',
									'style' => 'width: 60%',
								);
								echo form_input($attrib1);
								echo form_label('From', 'from');
								
								$attrib2 = array(
									'name' => 'from',
									'id' => 'from',
									'class' => 'form-control',
									'required' => 'required',
									'style' => 'width: 60%',
								);
								echo form_input($attrib2);
								
								echo form_label('To', 'to').'<p>';
								$attrib3 = array(
												'name' => 'to',
												'id' => 'to',
												'class' => 'form-control',
												'style' => 'width: 60%',
											);
								echo form_input($attrib3).'<p>';
								
								echo form_label('Remarks', 'remarks');
								$attrib4 = array(
												'name' => 'remarks',
												'id' => 'remarks',
												'class' => 'form-control',
												'style' => 'width: 60%',
											);
								echo form_input($attrib4).'<p>';
								
								echo form_label('Points', 'points');
								$attrib5 = array(
												'name' => 'points',
												'id' => 'points',
												'class' => 'form-control',
												'style' => 'width: 60%',
											);
								echo form_input($attrib5).'<p>';

								echo '</div><!-- /.modal body -->';
								echo '<div class="modal-footer">';
								echo '<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>';
								echo '<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button>';
								echo form_close();
								echo '</div><!-- /.modal footer -->';
								echo '</div><!-- /.modal content -->';
								echo '</div><!-- /.dialog -->';
								echo '</div><!-- /.modal -->';
							
							}
							
						}
						
					?>	
					<!-- /.add new class grading modal -->
					
					<!-- edit class grading modal -->
					<?php 
					
						if(isset($classes) AND $classes->num_rows() > 0)
						{
							foreach($classes->result() as $row)
							{
								echo '<div class="modal" id="edit_'.preg_replace('/\s+/', '_', $row->class).'_grading" tabindex="-1" role="dialog" aria-hidden="true">';
								echo '<div class="modal-dialog">';
								echo '<div class="modal-content">';
								echo '<div class="modal-header">';
								echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
								echo '<h4 class="modal-title"> Edit '.strtoupper(stripslashes($row->class)).' Grading</h4>';
								echo '</div><!-- /.modal header -->';
								echo '<div class="modal-body">';
								
								$grades_array = unserialize(stripslashes($row->grading));
								$grades = array_keys($grades_array);
								
								echo '<table class="col-lg-6 table"><tr><thead><th>Grade</th><th>From</th><th>To</th><th>Remarks</th><th>Points</th></thead></tr>';
								echo form_open('academics/grading');
								echo form_hidden('actionf', 'edit_grading');
								echo form_hidden('class', stripslashes($row->class));
								
								
								$count = count($grades);
								
								for($itr = 0; $itr < $count; $itr++)
								{
									$grade = $grades[$itr];
									echo form_hidden('grade', stripslashes($grade));
									
									echo '<tr><td>'.stripslashes($grade).'</td><td>';
									
									/*
									$grades_post_array = 'grades_post_array['.$grade.']';
									$attrib10 = array(
										'name' => $grades_post_array,
										'class' => 'hidden',
										'required' => 'required',
										'value' => $grade
									);
									echo form_input($attrib1).'</td><td>';
									*/
									
									$attrib1 = array(
										'name' => 'from',
										'id' => 'from',
										'class' => 'form-control',
										'required' => 'required',
										'value' => strtoupper(stripslashes($grades_array[$grade]['from'])),
									);
									echo form_input($attrib1).'</td><td>';
									
									$attrib2 = array(
										'name' => 'to',
										'id' => 'to',
										'class' => 'form-control',
										'required' => 'required',
										'value' => strtoupper(stripslashes($grades_array[$grade]['to'])),
									);
									echo form_input($attrib2).'</td><td>';
									
									$attrib3 = array(
										'name' => 'remarks',
										'id' => 'remarks',
										'class' => 'form-control',
										'required' => 'required',
										'value' => strtoupper(stripslashes($grades_array[$grade]['remarks'])),
									);
									echo form_input($attrib3).'</td><td>';
									
									$attrib4 = array(
										'name' => 'points',
										'id' => 'points',
										'class' => 'form-control',
										'required' => 'required',
										'value' => strtoupper(stripslashes($grades_array[$grade]['points'])),
									);
									echo form_input($attrib4).'</td></tr>';
									
								
								}
								
								echo '</table>';
								echo '</div><!-- /.modal body -->';
								echo '<div class="modal-footer">';
								echo '<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>';
								echo '<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button>';
								echo form_close();
								echo '</div><!-- /.modal footer -->';
								echo '</div><!-- /.modal content -->';
								echo '</div><!-- /.dialog -->';
								echo '</div><!-- /.modal -->';
							
							}
							
						}
						
					?>	
					<!-- edit class grading modal -->
					
				</div>
				<!-- /.row 2 -->