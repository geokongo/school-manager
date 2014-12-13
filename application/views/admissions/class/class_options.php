				<!-- row -->
				<div class="row">
					<!-- column 1 -->
					<div class="col-lg-12">
					<?php
					if(isset($classOptionsObject))
					{
						if($classOptionsObject->num_rows() > 0 )
						{
							foreach($classOptionsObject->result() as $classOption) 
							{ 
								$streams = unserialize(stripslashes($classOption->streams));
								$subjects = unserialize(stripslashes($classOption->subjects));
								$exams = unserialize(stripslashes($classOption->exams));
								$class = $classOption->class;
							}
							
						}
					
					}
						?>
						<p class="lead"><?php if(isset($class)) { echo stripslashes(strtoupper($class)); }  ?> Settings</p>
					
					</div>
					<!-- /.column -->
					
					<!-- streams columns -->
					<div class="col-lg-6">
						<table class="table" >
							<thead>
							<tr>
							<th class="col-lg-3"> Streams</th>
							<th class="col-lg-1"> Edit</th>
							<th class="col-lg-1"> Add New</th>
							<th class="col-lg-1"> Delete</th>
							</tr>
							</thead>
							<tbody>
							<?php 
								
								if(empty($streams)) 
								{ 
									echo '<tr><td>No registerer streams</td>';
									echo '<td><button type="button" class="btn btn-xs btn-primary" disabled><i class="glyphicon glyphicon-open"></i></button></td>';
									echo '<td><button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_new_streams"><i class="fa fa-plus"></i></button></td>';
									echo '<td><button type="button" class="btn btn-xs btn-primary" disabled><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
								
								}
								else
								{
									
									foreach($streams as $streamName => $streamArray)
									{
										
										echo '<tr><td>'.stripslashes($streamName).'</td>';
										echo '<td><a class="btn btn-xs btn-primary" href="" data-toggle="modal" data-target="#edit_'.preg_replace('/\s+/', '_',$class).'_'.preg_replace('/\s+/', '_',$streamName).'_stream"><i class="glyphicon glyphicon-open"></i></a></td>';
										echo '<td><button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_new_streams"><i class="fa fa-plus"></i></button></td>';
										echo '<td><a class="btn btn-xs btn-primary" href="" data-toggle="modal" data-target="#delete_'.preg_replace('/\s+/', '_', $class).'_'.preg_replace('/\s+/', '_',$streamName).'_stream"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
									
									}
									
								}
								
							?>
							</tbody>
						</table>
					</div>
					<!-- /.streams column -->
					
					<!-- subjects column -->
					<div class="col-lg-6">
						<table class="table" >
							<thead>
							<tr>
							<th class="col-lg-3">Subjects</th>
							<th class="col-lg-1"> Edit</th>
							<th class="col-lg-1"> Add New</th>
							<th class="col-lg-1"> Delete</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							
								if(empty($subjects))
								{
									echo '<td>No registered subjects</td>';
									echo '<td><button type="button" class="btn btn-xs btn-primary" disabled><i class="glyphicon glyphicon-open"></i></button></td>';
									echo '<td><button data-toggle="modal" data-target="#add_new_subjects" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></button></td>';
									echo '<td><button type="button" class="btn btn-xs btn-primary" disabled><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
								
								}
								else
								{
									foreach($subjects as $subjectIndex => $subjectName)
									{
										echo '<tr><td>'.stripslashes($subjectName).'</td>';
										echo '<td><a class="btn btn-xs btn-primary" href="" data-toggle="modal" data-target="#edit_subjects"><i class="glyphicon glyphicon-open"></i></a></td>';
										echo '<td><button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_new_subjects"><i class="fa fa-plus"></i></button></td>';
										echo '<td><a class="btn btn-xs btn-primary" href="" data-toggle="modal" data-target="#delete_subject_'.preg_replace('/\s+/', '_', $subjectName).'"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
										
									}
									
								}
							
							?>
						
						</table>
					
					</div>
					<!-- /.subjects column -->
					
					<!-- exams -->
					<div class="col-lg-6">
						<table class="table" >
							<thead>
							<tr>
							<th class="col-lg-3">Examinations</th>
							<th class="col-lg-1"> Edit</th>
							<th class="col-lg-1"> Add New</th>
							<th class="col-lg-1"> Delete</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							
								if(empty($exams))
								{
									echo '<td>No registered Examinations</td>';
									echo '<td><button type="button" class="btn btn-xs btn-primary" disabled><i class="glyphicon glyphicon-open"></i></button></td>';
									echo '<td><button data-toggle="modal" data-target="#add_new_exams" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></button></td>';
									echo '<td><button type="button" class="btn btn-xs btn-primary" disabled><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
								
								}
								else
								{
									$count = count($exams);
									
									foreach($exams as $examIndex => $examName)
									{
										echo '<tr><td>'.stripslashes($examName).'</td>';
										echo '<td><a class="btn btn-xs btn-primary" href="" data-toggle="modal" data-target="#edit_exams"><i class="glyphicon glyphicon-open"></i></a></td>';
										echo '<td><button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#add_new_exams"><i class="fa fa-plus"></i></button></td>';
										echo '<td><a class="btn btn-xs btn-primary" href="" data-toggle="modal" data-target="#delete_exams_'.preg_replace('/\s+/', '_', $examName).'"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
										
									}
									
								}
							
							?>
							</tbody>
						</table>
					
					</div>
					<!-- /.exams columns -->
				
				</div>
				<!-- /.row 1 -->
				
				<div class="row">
				<!-- row 2 -->
					
					<?php
					if(isset($class))
					{
					?>
						<!-- modals -->
						
						<!-- add_new_streams modal-->
						<div class="modal" id="add_new_streams" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<!-- modal dialog -->
							<div class="modal-dialog">
								<!-- modal content -->
								<div class="modal-content">
									<!-- modal header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
										<h4 class="modal-title">Add New <?php if(isset($class)) { echo strtoupper(stripslashes($class)); } ?> Streams</h4>
									</div>
									<!-- /.modal header -->
									
									<!-- modal body -->
									<div class="modal-body col">
										<!-- center block -->
										<div class="center-block">
											<?php
												echo '<p><strong> Stream </strong></p>';
												echo form_open('admissions/classes');
												echo form_hidden('actionf', 'add_new_streams');
												
												echo form_hidden('class', stripslashes($class));
												
												$attrib1 = array(
																'name' => 'stream',
																'id' => 'stream',
																'class' => 'form-control',
																'required' => 'required',
																'style' => 'width: 60%',
															);
												echo form_input($attrib1).'<p><p>';
										
												echo '<p><strong> Population </strong></p>';
												
												$attrib1 = array(
																'name' => 'population',
																'id' => 'population',
																'class' => 'form-control',
																'style' => 'width: 60%',
															);
												echo form_input($attrib1).'<p><p>';
										
												echo '<p><strong> Subjects </strong></p>';
												
												$stop = 5;
												for($start = 0; $start < $stop; $start++)
												{
													$attrib1 = array(
																	'name' => 'subjects[]',
																	'id' => 'subjects',
																	'class' => 'form-control',
																	'style' => 'width: 60%',
																);
													echo form_input($attrib1).'<p><p>';
												
												}
												
											?>
										</div>
										<!-- /.center block -->
									</div>
									<!-- /.modal body -->
									
									<!-- modal footer -->
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
										<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
									</div>
									<!-- /.modal footer -->
								
								</div>
								<!-- modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.add_new_streams modal -->
						
						<!-- edit class stream modal -->';
						<?php 
						
							if(isset($streams) && !empty($streams))
							{
								foreach($streams as $streamName => $streamArray)
								{
									echo '<div class="modal" id="edit_'.preg_replace('/\s+/', '_',$class).'_'.preg_replace('/\s+/', '_',$streamName).'_stream" tabindex="-1" role="dialog" aria-hidden="true">';
									echo '<div class="modal-dialog">';
									echo '<div class="modal-content">';
									echo '<div class="modal-header">';
									echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
									echo '<h4 class="modal-title"> Edit '.strtoupper(stripslashes($class)).' Streams</h4>';
									echo '</div><!-- /.modal header -->';
									echo '<div class="modal-body col">';
									echo '<p><strong>Stream</strong></p>';
									echo form_open('admissions/classes');
									echo form_hidden('actionf', 'edit_streams');
									echo form_hidden('class', stripslashes($class));
											
									$attrib1 = array(
										'name' => 'stream',
										'id' => 'stream',
										'class' => 'form-control',
										'value' => stripslashes($streamName),
										'required' => 'required',
										'style' => 'width: 60%',
									);
									echo form_input($attrib1);
									echo form_label('Population', 'population');
									
									$attrib2 = array(
										'name' => 'population',
										'id' => 'population',
										'class' => 'form-control',
										'value' => stripslashes($streamArray['population']),
										'required' => 'required',
										'style' => 'width: 60%',
									);
									echo form_input($attrib2);
									
									$count = count($streamArray['subjects']);
									
									echo form_label('Subjects', 'subjects').'<p>';
									for($itr = 0; $itr < $count; $itr++)
									{
										$attrib3 = array(
														'name' => 'subjects[]',
														'id' => 'subjects',
														'class' => 'form-control',
														'value' => stripslashes($streamArray['subjects'][$itr]),
														'style' => 'width: 60%',
													);
										echo form_input($attrib3).'<p>';
									
									
									}
									
									echo form_label('Add New Subject', 'subjects');
									$attrib4 = array(
													'name' => 'subjects[]',
													'id' => 'subjects',
													'class' => 'form-control',
													'value' => '',
													'style' => 'width: 60%',
												);
									echo form_input($attrib4).'<p>';
									
									
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
						<!-- delete class stream modal -->';
						<?php 
						
							if(isset($streams) && !empty($streams))
							{
								foreach($streams as $streamName => $streamArray)
								{
									echo '<div class="modal" id="delete_'.preg_replace('/\s+/', '_',$class).'_'.preg_replace('/\s+/', '_',$streamName).'_stream" tabindex="-1" role="dialog" aria-hidden="true">';
									echo '<div class="modal-dialog">';
									echo '<div class="modal-content">';
									echo '<div class="modal-header">';
									echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
									echo '<h4 class="modal-title"> Delete '.strtoupper(stripslashes($class)).' '.strtoupper(stripslashes($streamName)).'</h4>';
									echo '</div><!-- /.modal header -->';
									echo '<div class="modal-body col">';
									echo form_open('admissions/classes');
									echo form_hidden('action', 'delete');
									echo form_hidden('actionf', 'delete_streams');
									echo form_hidden('class', stripslashes($class));
									echo form_hidden('stream', stripslashes($streamName));
									
									echo '<p class="lead">Are you sure?</p>';
									
									
									echo '</div><!-- /.modal body -->';
									echo '<div class="modal-footer">';
									echo '<button type="button" data-dismiss="modal" class="btn btn-lg btn-primary"><i class="fa fa-times"></i>Cancel</button>';
									echo '<button type="submit" class="btn btn-lg btn-danger"><i class="fa fa-fw fa-check"></i>Delete</button>';
									echo form_close();
									echo '</div><!-- /.modal footer -->';
									echo '</div><!-- /.modal content -->';
									echo '</div><!-- /.dialog -->';
									echo '</div><!-- /.modal -->';
								
								}
								
							}
							
						?>
						
						<!-- add_new_subjects modal-->
						<div class="modal" id="add_new_subjects" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<!-- modal dialog -->
							<div class="modal-dialog">
								<!-- modal content -->
								<div class="modal-content">
									<!-- modal header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
										<h4 class="modal-title">ADD NEW <?php echo strtoupper(stripslashes($class));  ?> SUBJECTS</h4>
									</div>
									<!-- /.modal header -->
									
									<!-- modal body -->
									<div class="modal-body col">
										<!-- center block -->
										<div class="center-block">
											<?php
												echo '<p><strong> SUBJECTS </strong></p>';
												echo form_open('admissions/classes');
												echo form_hidden('actionf', 'add_new_subjects');
												
												echo form_hidden('class', stripslashes($class));
												
												$stop = 5;
												for($start = 0; $start < $stop; $start++)
												{
													$attrib1 = array(
																	'name' => 'subjects[]',
																	'id' => 'subjects',
																	'class' => 'form-control',
																	'style' => 'width: 60%',
																);
													echo form_input($attrib1).'<p><p>';
												
												}
												
											?>
										</div>
										<!-- /.center block -->
									</div>
									<!-- /.modal body -->
									
									<!-- modal footer -->
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
										<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
									</div>
									<!-- /.modal footer -->
								
								</div>
								<!-- modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.add_new_streams modal -->
						
						<!-- add_new_subjects modal-->
						<div class="modal" id="add_new_subjects" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<!-- modal dialog -->
							<div class="modal-dialog">
								<!-- modal content -->
								<div class="modal-content">
									<!-- modal header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
										<h4 class="modal-title">ADD NEW <?php echo strtoupper(stripslashes($class));  ?> SUBJECTS</h4>
									</div>
									<!-- /.modal header -->
									
									<!-- modal body -->
									<div class="modal-body col">
										<!-- center block -->
										<div class="center-block">
											<?php
												echo '<p><strong> SUBJECTS </strong></p>';
												echo form_open('admissions/classes');
												echo form_hidden('actionf', 'add_new_subjects');
												
												echo form_hidden('class', stripslashes($class));
												
												$stop = 5;
												for($start = 0; $start < $stop; $start++)
												{
													$attrib1 = array(
																	'name' => 'subjects[]',
																	'id' => 'subjects',
																	'class' => 'form-control',
																	'style' => 'width: 60%',
																);
													echo form_input($attrib1).'<p><p>';
												
												}
												
											?>
										</div>
										<!-- /.center block -->
									</div>
									<!-- /.modal body -->
									
									<!-- modal footer -->
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
										<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
									</div>
									<!-- /.modal footer -->
								
								</div>
								<!-- modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.add_new_subjects modal -->
						
						<!-- edit subjects modal-->
						<div class="modal" id="edit_subjects" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<!-- modal dialog -->
							<div class="modal-dialog">
								<!-- modal content -->
								<div class="modal-content">
									<!-- modal header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
										<h4 class="modal-title">EDIT  <?php echo strtoupper(stripslashes($class));  ?> SUBJECTS</h4>
									</div>
									<!-- /.modal header -->
									
									<!-- modal body -->
									<div class="modal-body col">
										<!-- center block -->
										<div class="center-block">
											<?php
												
												echo '<p><strong> SUBJECTS </strong></p>';

												if(isset($subjects))
												{
											
													echo form_open('admissions/classes');
													echo form_hidden('actionf', 'edit_subjects');
													
													echo form_hidden('class', stripslashes($class));
													
													$count = count($subjects);
													
													for($itr = 0; $itr < $count; $itr++)
													{
														$attrib1 = array(
																		'name' => 'subjects[]',
																		'id' => 'subjects',
																		'class' => 'form-control',
																		'value' => stripslashes($subjects[$itr]),
																		'style' => 'width: 60%',
																	);
														echo form_input($attrib1).'<p><p>';
													
													}
													
												}
												
											?>
										</div>
										<!-- /.center block -->
									</div>
									<!-- /.modal body -->
									
									<!-- modal footer -->
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
										<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
									</div>
									<!-- /.modal footer -->
								
								</div>
								<!-- modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.edit subjects modal -->
						
						<!-- add_new_exams modal-->
						<div class="modal" id="add_new_exams" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<!-- modal dialog -->
							<div class="modal-dialog">
								<!-- modal content -->
								<div class="modal-content">
									<!-- modal header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
										<h4 class="modal-title">ADD NEW <?php echo strtoupper(stripslashes($class));  ?> EXAMINATIONS</h4>
									</div>
									<!-- /.modal header -->
									
									<!-- modal body -->
									<div class="modal-body col">
										<!-- center block -->
										<div class="center-block">
											<?php
												echo '<p><strong> EXAMINATIONS </strong></p>';
												echo form_open('admissions/classes');
												echo form_hidden('actionf', 'add_new_exams');
												
												echo form_hidden('class', stripslashes($class));
												
												$stop = 3;
												for($start = 0; $start < $stop; $start++)
												{
													$attrib1 = array(
																	'name' => 'exams[]',
																	'id' => 'exams',
																	'class' => 'form-control',
																	'style' => 'width: 60%',
																);
													echo form_input($attrib1).'<p><p>';
												
												}
												
											?>
										</div>
										<!-- /.center block -->
									</div>
									<!-- /.modal body -->
									
									<!-- modal footer -->
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
										<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
									</div>
									<!-- /.modal footer -->
								
								</div>
								<!-- modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.add_new_exams modal -->
						
						<!-- delete class subjects modal -->';
						<?php 
						
							if(isset($subjects) && !empty($subjects))
							{
								$count = count($subjects);
								
								for($itr = 0; $itr < $count; $itr++)
								{
									echo '<div class="modal" id="delete_subject_'.preg_replace('/\s+/', '_', $subjects[$itr]).'" tabindex="-1" role="dialog" aria-hidden="true">';
									echo '<div class="modal-dialog">';
									echo '<div class="modal-content">';
									echo '<div class="modal-header">';
									echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
									echo '<h4 class="modal-title"> Delete '.strtoupper(stripslashes($subjects[$itr])).' </h4>';
									echo '</div><!-- /.modal header -->';
									echo '<div class="modal-body col">';
									echo form_open('admissions/classes');
									echo form_hidden('action', 'delete');
									echo form_hidden('actionf', 'delete_subjects');
									echo form_hidden('class', stripslashes($class));
									echo form_hidden('subject', stripslashes($subjects[$itr]));
									
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
								
							}
							
						?>
						
						<!-- edit exams modal-->
						<div class="modal" id="edit_exams" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<!-- modal dialog -->
							<div class="modal-dialog">
								<!-- modal content -->
								<div class="modal-content">
									<!-- modal header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
										<h4 class="modal-title">EDIT  <?php echo strtoupper(stripslashes($class));  ?> EXAMINATIONS</h4>
									</div>
									<!-- /.modal header -->
									
									<!-- modal body -->
									<div class="modal-body col">
										<!-- center block -->
										<div class="center-block">
											<?php
												
												echo '<p><strong> EXAMINATIONS </strong></p>';

												if(isset($exams))
												{
											
													echo form_open('admissions/classes');
													echo form_hidden('actionf', 'edit_exams');
													
													echo form_hidden('class', stripslashes($class));
													
													$count = count($exams);
													
													for($itr = 0; $itr < $count; $itr++)
													{
														$attrib1 = array(
																		'name' => 'exams[]',
																		'id' => 'exams',
																		'class' => 'form-control',
																		'value' => stripslashes($exams[$itr]),
																		'style' => 'width: 60%',
																	);
														echo form_input($attrib1).'<p><p>';
													
													}
													
												}
												
											?>
										</div>
										<!-- /.center block -->
									</div>
									<!-- /.modal body -->
									
									<!-- modal footer -->
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-lg btn-danger"><i class="fa fa-times"></i>Cancel</button>
										<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button><?php echo form_close(); ?>
									</div>
									<!-- /.modal footer -->
								
								</div>
								<!-- modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.edit exams modal -->
						
						<!-- delete class exams modal -->';
						<?php 
						
							if(isset($exams) && !empty($exams))
							{
								$count = count($exams);
								
								for($itr = 0; $itr < $count; $itr++)
								{
									echo '<div class="modal" id="delete_exams_'.preg_replace('/\s+/', '_', $exams[$itr]).'" tabindex="-1" role="dialog" aria-hidden="true">';
									echo '<div class="modal-dialog">';
									echo '<div class="modal-content">';
									echo '<div class="modal-header">';
									echo '<button type="button" data-dismiss="modal" class="close" aria-hidden="true"><i class="fa fa-times"></i></button>';
									echo '<h4 class="modal-title"> Delete '.strtoupper(stripslashes($exams[$itr])).' </h4>';
									echo '</div><!-- /.modal header -->';
									echo '<div class="modal-body col">';
									echo form_open('admissions/classes');
									echo form_hidden('action', 'delete');
									echo form_hidden('actionf', 'delete_exams');
									echo form_hidden('class', stripslashes($class));
									echo form_hidden('exams', stripslashes($exams[$itr]));
									
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
								
							}
						?>	
					<?php
					}
					?>
					
				</div>
				<!-- /.row -->