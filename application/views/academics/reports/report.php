<section id="content">
	<div id="main">
		<div id="report">
			<div class="header">
				<?php
					echo '<h1>Sample School Academy</h1>';
					echo '<h1>P . O . Box 1999</h1>';
					echo '<h1> Austin Texas</h1>';
					echo '<hr />';
				?>
			</div>
			<div class="content">
				<?php
					$output = $this->session->userdata('sess');
					$exams = $this->session->userdata('exams');
					$subjects = $this->session->userdata('subjects');
					$report = $this->session->userdata('report');

					$n_subjects = $subjects->num_rows();
					$n_exams = $exams->num_rows();

					$score_ = $this->session->userdata('total_avg')/$n_subjects;
					$score = round($score_, 0);

					echo '<h2>End of <span style=" text-decoration: underline; " > '.$this->session->userdata('term').' '.$this->session->userdata('year').'</span> <br />';
					echo 'Name :  <span style=" text-decoration: underline; " >'.$this->session->userdata('name').'</span>  Admission Number : <span style=" text-decoration: underline; " >'.$this->session->userdata('adm').'</span><br /> ';
					echo 'Class : <span style=" text-decoration: underline; " >'.$this->session->userdata('class').'</span> Stream : <span style=" text-decoration: underline; " >'.$this->session->userdata('stream').'</span> &nbsp Average Grade: <span style=" text-decoration: underline; " >'.$this->grading->get_grade($score).'</span></h2> '; 

						echo "<table border=\"1\">";
						echo "<tr><td>SUBJECT</td>";

						foreach($exams->result() as $x)
						{
							echo "<td>{$x->EXAM}</td>";
					 
						}

						echo "<td>AVG</td><td>GRADE</td><td>REMARKS</td></tr>";
						
						foreach($report->result_array() as $row)
						{
							echo "<tr>";
							
							foreach($row as $name => $value)
							{
								echo "<td>{$value}</td>";
							
							}
							
							$score = $row['AVG'];
							echo "<td> &nbsp {$this->grading->get_grade($score)}</td><td> &nbsp {$this->grading->get_remarks($score)}  </td></tr>";
						
						}
						
						$colspan = $n_exams + 1;
						
						echo "<tr><td colspan=\"{$colspan}\">TOTAL</td><td>{$this->session->userdata('total_avg')} </td><td>Out Of</td><td>{$this->session->userdata('out_of_score')} </td></tr> ";
						echo "<tr><td colspan=\"{$colspan}\">POSITION</td><td>{$this->session->userdata('pos')} </td><td>Out Of</td><td>{$this->session->userdata('no_of_students')} </td></tr> ";

						echo "</table>";
					
				?>
			</div>
			<div class="footer">
						<p>Class Teacher's Remarks .....................................................................................................................................................
						<p>	.................................................................................................................................................................
						<p>............................................................................................................................................................
						<p>...........................................................Sign  ..............................  Date  ...........................................
							
						<p>Head Teacher's Remarks .....................................................................................................................................................
						<p>	.................................................................................................................................................................
						<p>............................................................................................................................................................
						<p>...........................................................Sign  ..............................  Date  ...........................................

			
			</div>
			
		</div>
	</div>
</section>