				<!-- Page Row -->
				<div class="row">
						<!-- column -->
						<div class="col-lg-12">
							<p class="lead">Classes </p>
							
						</div>
						<!-- /.column -->
						
						<!-- column 2 -->
						<div class="col-lg-10">
							<?php if(isset($error_message)) { echo $error_message; } ?>
							<?php if(isset($success_message)) { echo $success_message; } ?>
							<table class="table col-lg-4">
							<thead>
								<tr><th>Class</th><th>Streams</th><th>Subjects</th><th>Exams</th><th>Population</th><th>View</th></tr>
							</thead>
							<tbody>
								<?php 
									foreach($availableClassesObject->result() as $classObject)
									{
										$class = $classObject->class;
										$streams = unserialize(stripslashes($classObject->streams));
										$subjects = unserialize(stripslashes($classObject->subjects));
										$exams = unserialize(stripslashes($classObject->exams));
										$population = $classObject->population;
										
									
									
										echo '<tr><td>'.stripslashes($class).'</td>';
										
										if(empty($streams)) {	echo '<td>Streams(0)</td>';	}
										else {	echo '<td>Streams('.count($streams).')</td>'; }
							 
										if(empty($subjects)) {	echo '<td>Subjects(0)</td>';	}
										else {	echo '<td>Subjects('.count($subjects).')</td>';	}
							 
										if(empty($exams)) {	echo '<td>Exams(0)</td>';	}
										else {	echo '<td>Exams('.count($exams).')</td>';	}
							 
										if(empty($population)) {	echo '<td>Population(0)</td>';	}
										else {	echo '<td>Population('.stripslashes($population).')</td>';	}
										echo '<td><a class="btn btn-xs btn-primary" href="'.base_url().'admissions/classes/view_class/'.preg_replace('/\s+/', '_', $classObject->class).'" data-toggle="tooltip" data-placement="bottom" title="Click to view more details and set options"><i class="glyphicon glyphicon-open"></i></a></td></tr>';
										
									}
								
								?>
							</tbody>
							</table>
							
							<hr />
							
							<!-- Button trigger modal -->
							<button class="btn btn-small btn-primary" data-toggle="modal" data-target="#add_new_class">Add New Class<i class="fa fa-plus"></i></button>
						
						</div>
						<!-- /.column 2 -->
				</div>
				<!-- row 1 -->
				

				<!-- Modals -->
				
				<div class="row">
				<!-- row 2 --> 				
					<!-- Add New Class modal -->
					<div class="modal" id="add_new_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					   <div class="modal-dialog">
						  <div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
								<h4 class="modal-title" id="myModalLabel">
								   Enter New Class
								</h4>
							 </div>
							 <div class="modal-body col">
							<?php 
								echo form_open('admissions/classes');
								echo form_hidden('actionf', 'add_new_class');
								$attrib1 = array(
												'name' => 'class',
												'id' => 'class',
												'class' => 'form-control',
												'required' => 'required',
												'style' => 'width: 50%',
											);
								echo form_input($attrib1).'<p><p>';
							
							?>
							 </div>
							 <div class="modal-footer">
								<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
								<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i> Save </button>
								<?php echo form_close(); ?>
							 </div>
						  </div>
						  <!-- /.modal-content -->
					</div>
					<!-- /.add new class modal -->	
				</div>
				<!-- /.page row -->