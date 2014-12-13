				<!-- row -->
				<div class="row">
					<!-- first column -->
					<div class="col-lg-12">
						<?php 
							if(isset($settingsObject))
							{
								echo '<p class="lead">Settings</p>';
								
								foreach($settingsObject->result() as $settingsItem)
								{
									$years = $settingsItem->years;
									$terms = $settingsItem->terms;
									$termDates = unserialize(stripslashes($settingsItem->term_dates));
								
								}
								
								if(empty($years))
								{
									echo '<p class="lead">Years</p>';
									echo '<table class="table col-lg-6"><tr><thead><th colspan="2">Registered Years</th><th>Add New</th></thead></tr>';
									echo '<tr><td colspan="2">No registered years yet.</td><td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#addNewYear"><i class="fa fa-fw fa-plus"></i></button></td></tr>';
									echo '</table>';
								
								}
								else
								{
									echo '<p class="lead">Years</p>';
									echo '<table class="table col-lg-6"><tr><thead><th colspan="2">Registered Years</th><th>Add New</th></thead></tr>';
									
									$years = unserialize($years);
									
									foreach($years as $yearIndex => $yearName)
									{
										echo '<tr><td>'.$yearName.'</td><td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit'.$yearName.'"><i class="glyphicon glyphicon-open"></i></button><td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#delete'.$yearName.'"><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
									
									}
									
									echo '</table>';
								}
								
								if(empty($terms))
								{
									echo '<p class="lead">Terms</p>';
									echo '<table class="table col-lg-6"><tr><thead><th colspan="2">Registered Terms</th><th>Add New</th></thead></tr>';
									echo '<tr><td colspan="2">No registered terms yet.</td><td><a href="'.base_url().'settings/termDates/addNewTerm" class="btn btn-xs btn-primary" ><i class="fa fa-fw fa-plus"></i></a></td></tr>';
									echo '</table>';
								
								}
								else
								{
									echo '<p class="lead">Terms</p>';
									echo '<table class="table col-lg-6"><tr><thead><th colspan="2">Registered Terms</th><th><a href="'.base_url().'settings/termDates/addNewTerm" class="btn btn-xs btn-primary" ><i class="fa fa-fw fa-plus"></i></a></th></thead></tr>';
									
									$terms = unserialize(stripslashes($terms));
									
									foreach($terms as $termIndex => $termName)
									{
										echo '<tr><td>'.$termName.'</td><td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit'.$termName.'"><i class="glyphicon glyphicon-open"></i></button><td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#delete'.$termName.'"><i class="glyphicon glyphicon-trash"></i></button></td></tr>';
									
									}
									
									echo '</table>';
									
								}
								
								if(empty($termDates))
								{
									echo '<p class="lead">Term Dates</p>';
									echo '<table class="table col-lg-8"><tr><thead><th>Term</th><th>Opening Date</th><th>Mid Term Break</th><th>Closing Date</th></thead></tr>';
									
								}
								else
								{
									echo '<p class="lead">Term Dates</p>';
									echo '<table class="table col-lg-8"><tr><thead><th>Term</th><th>Opening Date</th><th>Mid Term Break</th><th>Closing Date</th></thead></tr>';
									
									//$termDates = unserialize($termDates);
									
									foreach($termDates as $termName => $termInfo)
									{
										echo '<tr><td>'.$termName.'</td><td>'.date('l, F jS, Y', $termInfo['openingDate']).'</td><td>'.date('l, F jS, Y', $termInfo['midTermBreak']).'</td><td>'.date('l, F jS, Y', $termInfo['closingDate']).'</td></tr>';
										
									}
									
									echo '</table>';
								
								}
								
								?>
								<!-- add new year modal-->
								<div class="modal" id="addNewYear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<!-- modal dialog -->
									<div class="modal-dialog">
										<!-- modal content -->
										<div class="modal-content">
											<!-- modal header -->
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
												<h4 class="modal-title">Years</h4>
											</div>
											<!-- /.modal header -->
											
											<!-- modal body -->
											<div class="modal-body col">
											<p><strong>Add New Year</p>
											<?php
											echo form_open('academics/enter_marks');
											echo form_hidden('actionf', 'addNewTerm');
								
											?>
											<input type="text" class="form-control" name="year" style="width : 60%; " required />
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
								<!-- /.addNewYear modal -->
								
								<?php
								
							}
							
							if(isset($addNewTerm))
							{
							
								echo '<p class="lead">Add New Term</p>';
								echo form_open('settings/termDates');
								echo form_hidden('actionf', 'addNewTerm');
								
								echo '<table class="table col-lg-6">';
								echo '<tr ><td  style="width : 50%; "><strong>TERM</strong></td><td style="width : 50%; "><input type="text" name="term" class="form-control" required  /></td></tr>';
								echo '<tr ><td><strong>OPENING DATE</strong></td><td><input type="text" name="openingDate"  class="form-control datepicker" required /></td></tr>';
								echo '<tr ><td><strong>MID TERM BREAK</strong></td><td><input type="text" name="midTermBreak"  class="form-control datepicker" required /></td></tr>';
								echo '<tr ><td><strong>CLOSING DATE</strong></td><td><input type="text" name="closingDate"  class="form-control datepicker" required /></td></tr>';
								
								
								echo '</table>';
								echo '<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-check"></i>Save</button>';
								echo form_close();
								
							
							}
							
						?>
							
					</div>
					<!-- close first colum -->
				</div>
				<!-- close row -->