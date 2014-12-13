				<div class="row">
					<h1>This is the page header</h1>
					<small>This is an inline sub heading. You see it is smaller and lighter</small>
				</div>
				
				<div class="row">
					<h1>This is the homepage itself</h1>
					<h2>Hello World!</h2>
				</div>
				
				<div class="row">
					<p>This is now another row</p>
					<p>This is a <a href="#">link</a>. It gets underlined on hover</p>
					<p class="lead"> I want to emphasize this line of text using the lead class</p>
					<p>I am going to <abbr title="this is the master of the game">>mog</abbr> this text. Okay?</p>
					<p>Let's try to listitems below</p>
					<ul>
						<li>These are bulleted</li>
						<li>Monday</li>
						<li>Tuesday</li>
						<li>Wednesday</li>
					</ul>
					
					<ul class="list-unstyled">
						<li>These are not bulleted</li>
						<li>Monday</li>
						<li>Tuesday</li>
						<li>Wednesday</li>
					</ul>
					<p>These will now be displayed inline</pack>
					<ul class="list-inline">
						<li>Monday</li>
						<li>Tuesday</li>
						<li>Wednesday</li>
					</ul>
					
					<p>This is code for loading the session library <code>$this->load->library('session')</code>. Did you see it?</p>
					<p>Now lets display multiple lines of code</p>
					<pre>
					$this->load->library('session');
					$this->load->library('database');
					$this->load->helper('url');
					$this->load->helper('form');
					</pre>
					
					<p>Lets now do some simple table</p>
					<table class="table table-striped">
						<tr>
							<td>Days</td>
							<td>Monday</td>
							<td>Tuesday</td>
							<td>Wednesday</td>
						</tr>
						<tr>
							<td>Months</td>
							<td>January</td>
							<td>February</td>
							<td>March</td>
						</tr>
						<tr>
							<td>Subjects</td>
							<td>English</td>
							<td>Kiswahili</td>
							<td>Science</td>
						</tr>
						<tr>
							<td>Schools</td>
							<td>Pre-School</td>
							<td>Primary</td>
							<td>Secondary</td>
						</tr>
					
					</table>
					
					<p>This table has borders and hover table</p>
					<table class="table table-bordered table-hover">
						<thead>
						<tr class="active">
							<th>Days</th>
							<td>Monday</td>
							<td>Tuesday</td>
							<td>Wednesday</td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<th>Months</th>
							<td class="danger">January</td>
							<td>February</td>
							<td>March</td>
						</tr>
						<tr>
							<th>Subjects</th>
							<td>English</td>
							<td class="success">Kiswahili</td>
							<td>Science</td>
						</tr>
						<tr>
							<th>Schools</th>
							<td>Pre-School</td>
							<td>Primary</td>
							<td class="warning">Secondary</td>
						</tr>
						</tbody>
					
					</table>
					
					<p>We will now create a form for collecting user information</p>
					<div class="form-group">
						<form class="form-horizontal">
							<label for="adm" class="control-label"> Admission Number</label>
							<input type="text" name="adm" id="adm" class="form-control"/>
							<label for="f_name" class="control-label"> First Name</label>
							<input type="text" name="f_name" id="f_name" class="form-control "/>
							<label for="m_name"> Middle Name</label>
							<input type="text" name="m_name" id="m_name" class="form-control" disabled="disabled"/>
							<label for="l_name"> Last Name</label>
							<input type="text" name="l_name" id="l_name" class="form-control"/>
							<input type="submit" name="submit" value="submit" class="btn btn-lg"/>
						</form>
						<span class="glyphicon glyphicon-search"></span>
						<span class="caret"></span>
					</div>

				</div>
