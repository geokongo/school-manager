				<!-- row -->
				<div class="row">
					<!-- wide column -->
					<div class="col-lg-12">
						<p class="alert alert-danger">There are no registered classes yet</p>
					</div>
					<!-- /.wide column -->
						
					<!-- another column -->
					<div class="col-lg-12">
						<!-- Button trigger modal -->
						<button class="btn btn-small btn-primary" data-toggle="modal" data-target="#add_new_class">Add New Class<i class="fa fa-plus"></i></button>
						
						<!-- Dummy div to add space -->
						<div class="col-lg-12">
						</div>
						<!-- close dummy div -->
					</div>
					<!-- /.another  column -->
					
					
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
				<!-- /.row -->
				