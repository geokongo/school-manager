	<!-- Dummy row for padding -->
	<div class="row input-lg">
	
	</div>
	<!-- /.dummy row -->
	
	<!-- Page Heading -->
	<div class="row">
	
		<!-- .col-lg-8 -->
		<div class="col-lg-8 col-lg-offset-4">
		
			<!-- .form-group -->
			<div class="form-group">
				
				<?php 
				echo form_open('login/checkuser', 'class="col-lg-4 form-inline"').'<p>';
				echo form_hidden('actionf', 'checkuser');
				echo '<p class="lead">Login</p>';
				
				if(isset($error))
				{
					echo $error;
				
				}
				echo form_label('Username', 'username'); 
				
				$attrib1 = array(
							'class' => 'form-control',
							'name' => 'username',
							'id' => 'username',
							'size' => 20,
							'required' => 'required'
						);
				echo form_input($attrib1).'</p><p>';
				echo form_label('Password', 'password');
				
				$attrib2 = array(
							'class' => 'form-control',
							'name' => 'password',
							'id' => 'password',
							'size' => 20,
							'required' => 'required'
						);
				echo form_password($attrib2).'</p><p>';
				
				echo form_submit('submit', 'Login', 'class="btn btn-lg btn-primary"');
				
				echo form_close();?>
				
			
			</div>
			<!-- /.form-group -->
			
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-4 col-lg-offset-4">
			<img src="<?php echo base_url(); ?>images/twitter/images.jpg" width="240" height="180" alt="Login with Social Network Sites"	usemap="#planetmap" />
			<map name="planetmap">
			  <area shape="rect" coords="0,0,240,60" href="<?php echo base_url(); ?>face" alt="Sun">
			  <area shape="rect" coords="0,41,240,110" href="<?php echo base_url(); ?>twitter" alt="Mercury">
			  <area shape="rect" coords="0,80,240,180" href="<?php echo base_url(); ?>googleplus" alt="Venus">
			</map> 
		
		
		</div>
		
	</div>
	<!-- /.row -->