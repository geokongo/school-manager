				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	$(function() {
		
		$(".container-fluid").on('change', '#class', function(){
		
			$('div.class_options').html('<button id="fat-btn" class="btn btn-primary" type="button">Loading...</button>');
		
			var form_data = {
				selected_class: $('#class').val(),
				actionf: 'get_class_options'

			};
			
			$.ajax({
				url: $('form').attr('action'),
				type: 'POST',
				data: form_data,
				success: function(msg) {
					$('div.class_options').html(msg);
				
				},
				error : function(val1, val2, val3) {
					$('div.class_options').html(val1, val2, val3);
				}
				
			});
		
		});
		
		$(".container-fluid").on('change', '#stream', function(){
		
			$('div.subjects').html('<button id="fat-btn" class="btn btn-primary" type="button">Loading...</button>');
		
			var form_data = {
				selected_class : $('#class').val(),
				selected_stream : $('#stream').val(),
				actionf : 'get_stream_subjects'

			};
			
			$.ajax({
				url: $('form').attr('action'),
				type: 'POST',
				data: form_data,
				success: function(msg) {
					$('div.subjects').html(msg);
				
				},
				error : function(val1, val2, val3) {
					$('div.subjects').html(val1, val2, val3);
				}
				
			});
		
		});
		
		$(".container-fluid").on('change', '.outOfScore', function() {
			var outOf = $(this).val();
			
			$('.outOfScore').val(outOf);
			
			$('.score').each(function() {
				var selector = '#' + $(this).attr('name');
				var score = Math.round(($(this).val() / $('.outOfScore').val()) * 100);
				$(selector).val(score);
			});
			
		});
		
		$(".container-fluid").on('change', '.score', function() {
			var selector = '#' + $(this).attr('name');
			var outOfScore = $('.outOfScore').val();
			
			if(outOfScore == 0)
			{
				alert('Set Out of Score first');
			
			}
			else
			{
				var score = Math.round(($(this).val() / outOfScore) * 100);
				
				$(selector).val(score);
				
			}
			
		});
		
		$(".container-fluid").on('blur', '#adm', function(){
			
			$('div.adm_message').html('<button id="fat-btn" class="btn btn-primary" type="button">Loading...</button>');
		
			var form_data = {
				adm : $('#adm').val(),
				actionf : 'check_admission_number'

			};
			
			$.ajax({
				url: $('form').attr('action'),
				type: 'POST',
				data: form_data,
				success: function(msg) {
					$('div.adm_message').html(msg);
				
				},
				error : function(val1, val2, val3) {
					$('div.streams').html(val1, val2, val3);
				}
				
			});
		
		});
		
	});
	
	</script>
	<script>
		$(".container-fluid").on('change', '#class_cl', function(){
		
		$('div.class_options').html('<button id="fat-btn" class="btn btn-primary" type="button">Loading...</button>');
	
		var form_data = {
			selected_class: $('#class_cl').val(),
			actionf: 'get_class_options'

		};
		
		$.ajax({
			url: $('form').attr('action'),
			type: 'POST',
			data: form_data,
			success: function(msg) {
				$('div.class_options').html(msg);
			
			},
			error : function(val1, val2, val3) {
				$('div.class_options').html(val1, val2, val3);
			}
			
		});
	
	});
	
	</script>
	
	<script>
		$(document).ready(function() {
			$(".container-fluid").on('change', '.englishLANG', function() {
				var id = $(this).attr('id');
				var totalScore = +($('.' + id + 'englishCOMP').val()) + +($('.' + id + 'englishLANG').val())
				
				$('.' + id + 'english').val(Math.round((+totalScore / 90) * 100));
				$('.english').blur();
			
			});
			
			$(".container-fluid").on('change', '.englishCOMP', function() {
				var id = $(this).attr('id');
				var totalScore = +($('.' + id + 'englishCOMP').val()) + +($('.' + id + 'englishLANG').val())
				
				$('.' + id + 'english').val(Math.round((+totalScore / 90) * 100));
				$('.english').blur();
			
			});
			
			$(".container-fluid").on('change', '.kiswahiliLUG', function() {
				var id = $(this).attr('id');
				var totalScore = +($('.' + id + 'kiswahiliLUG').val()) + +($('.' + id + 'kiswahiliINS').val())
				
				$('.' + id + 'kiswahili').val(Math.round((+totalScore / 90) * 100));
				$('.kiswahili').blur();
			
			});
			
			$(".container-fluid").on('change', '.kiswahiliINS', function() {
				var id = $(this).attr('id');
				var totalScore = +($('.' + id + 'kiswahiliLUG').val()) + +($('.' + id + 'kiswahiliINS').val())
				
				$('.' + id + 'kiswahili').val(Math.round((+totalScore / 90) * 100));
				$('.kiswahili').blur();
			
			});
			
			$(".container-fluid").on('change', '.socialStudiesSST', function() {
				var id = $(this).attr('id');
				var totalScore = +($('.' + id + 'socialStudiesSST').val()) + +($('.' + id + 'socialStudiesCRE').val())
				
				$('.' + id + 'socialStudies').val(Math.round((+totalScore / 90) * 100));
				$('.socialStudies').blur();
			
			});
			
			$(".container-fluid").on('change', '.socialStudiesCRE', function() {
				var id = $(this).attr('id');
				var totalScore = +($('.' + id + 'socialStudiesSST').val()) + +($('.' + id + 'socialStudiesCRE').val())
				
				$('.' + id + 'socialStudies').val(Math.round((+totalScore / 90) * 100));
				$('.socialStudies').blur();
			
			});
			
			$(".container-fluid").on('change', '.maths', function() {
				var id = $(this).attr('id');
				
				$('.' + id + 'maths').val(Math.round((+$(this).val() * 2)));
				$('.maths').blur();
			
			});
			
			$(".container-fluid").on('change', '.science', function() {
				var id = $(this).attr('id');
				
				$('.' + id + 'science').val(Math.round((+$(this).val() * 2)));
				$('.science').blur();
			
			});
			
			
			$(".container-fluid").on('blur', '.english', function() {
				var numberOfStudents = $('.english').length;
				var totalEnglishScore = 0;
				var id = $(this).attr('id');
				var thisTotal = Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() ));
				$('.' + id + 'Total').val(thisTotal);
				
				$('.english').each(function() {
					totalEnglishScore += +$(this).val();
				
				});
				
				$('#englishTotal').val(totalEnglishScore);
				$('#englishMeanScore').val(Math.round((totalEnglishScore / numberOfStudents)));
				
				var subjectMeanScoreArray = [$('#englishMeanScore').val(),$('#kiswahiliMeanScore').val(),$('#scienceMeanScore').val(),$('#socialStudiesMeanScore').val(),$('#mathsMeanScore').val()];
				subjectMeanScoreArray.sort(function(a, b){return b-a});
				$('#englishPosition').val(1 + +subjectMeanScoreArray.indexOf($('#englishMeanScore').val()));
				$('#kiswahiliPosition').val(1 + +subjectMeanScoreArray.indexOf($('#kiswahiliMeanScore').val()));
				$('#mathsPosition').val(1 + +subjectMeanScoreArray.indexOf($('#mathsMeanScore').val()));
				$('#sciencePosition').val(1 + +subjectMeanScoreArray.indexOf($('#scienceMeanScore').val()));
				$('#socialStudiesPosition').val(1 + +subjectMeanScoreArray.indexOf($('#socialStudiesMeanScore').val()));
				
				var totalMarks = 0;
				var totalMarksArray = [];
				
				$('.total').each(function() {
					totalMarksArray.push(+$(this).val());
					totalMarks += +$(this).val();
				
				});
				
				totalMarksArray.sort(function(a, b){return b-a});
				$('#total').val(totalMarks);
				$('#meanScore').val(Math.round(totalMarks / numberOfStudents));
				
				$('.total').each(function() {
					var id = $(this).attr('id');
					var pos = 1 + +totalMarksArray.indexOf(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
					$('#' + id + 'Pos').val(pos);

				
				});
				
			});
			
			$(".container-fluid").on('blur', '.kiswahili', function() {
				var numberOfStudents = $('.kiswahili').length;
				var totalKiswahiliScore = 0;
				var id = $(this).attr('id');
				$('.' + id + 'Total').val(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
				
				$('.kiswahili').each(function() {
					totalKiswahiliScore += +$(this).val();
				
				});
				
				$('#kiswahiliTotal').val(totalKiswahiliScore);
				$('#kiswahiliMeanScore').val(Math.round((totalKiswahiliScore / numberOfStudents)));
				
				var subjectMeanScoreArray = [$('#englishMeanScore').val(),$('#kiswahiliMeanScore').val(),$('#scienceMeanScore').val(),$('#socialStudiesMeanScore').val(),$('#mathsMeanScore').val()];
				subjectMeanScoreArray.sort(function(a, b){return b-a});
				$('#englishPosition').val(1 + +subjectMeanScoreArray.indexOf($('#englishMeanScore').val()));
				$('#kiswahiliPosition').val(1 + +subjectMeanScoreArray.indexOf($('#kiswahiliMeanScore').val()));
				$('#mathsPosition').val(1 + +subjectMeanScoreArray.indexOf($('#mathsMeanScore').val()));
				$('#sciencePosition').val(1 + +subjectMeanScoreArray.indexOf($('#scienceMeanScore').val()));
				$('#socialStudiesPosition').val(1 + +subjectMeanScoreArray.indexOf($('#socialStudiesMeanScore').val()));
				
				var totalMarks = 0;
				var totalMarksArray = [];
				
				$('.total').each(function() {
					totalMarksArray.push(+$(this).val());
					totalMarks += +$(this).val();
				
				});
				
				totalMarksArray.sort(function(a, b){return b-a});
				$('#total').val(totalMarks);
				$('#meanScore').val(Math.round(totalMarks / numberOfStudents));
				
				$('.total').each(function() {
					var id = $(this).attr('id');
					var pos = 1 + +totalMarksArray.indexOf(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
					$('#' + id + 'Pos').val(pos);

				
				});
				
			});
			
			$(".container-fluid").on('blur', '.socialStudies', function() {
				var numberOfStudents = $('.socialStudies').length;
				var totalSocialStudiesScore = 0;
				var id = $(this).attr('id');
				$('.' + id + 'Total').val(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
				
				$('.socialStudies').each(function() {
					totalSocialStudiesScore += +$(this).val();
				
				});
				
				$('#socialStudiesTotal').val(totalSocialStudiesScore);
				$('#socialStudiesMeanScore').val(Math.round((totalSocialStudiesScore / numberOfStudents)));
				
				var subjectMeanScoreArray = [$('#englishMeanScore').val(),$('#kiswahiliMeanScore').val(),$('#scienceMeanScore').val(),$('#socialStudiesMeanScore').val(),$('#mathsMeanScore').val()];
				subjectMeanScoreArray.sort(function(a, b){return b-a});
				$('#englishPosition').val(1 + +subjectMeanScoreArray.indexOf($('#englishMeanScore').val()));
				$('#kiswahiliPosition').val(1 + +subjectMeanScoreArray.indexOf($('#kiswahiliMeanScore').val()));
				$('#mathsPosition').val(1 + +subjectMeanScoreArray.indexOf($('#mathsMeanScore').val()));
				$('#sciencePosition').val(1 + +subjectMeanScoreArray.indexOf($('#scienceMeanScore').val()));
				$('#socialStudiesPosition').val(1 + +subjectMeanScoreArray.indexOf($('#socialStudiesMeanScore').val()));
				
				var totalMarks = 0;
				var totalMarksArray = [];
				
				$('.total').each(function() {
					totalMarksArray.push(+$(this).val());
					totalMarks += +$(this).val();
				
				});
				
				totalMarksArray.sort(function(a, b){return b-a});
				$('#total').val(totalMarks);
				$('#meanScore').val(Math.round(totalMarks / numberOfStudents));
				
				$('.total').each(function() {
					var id = $(this).attr('id');
					var pos = 1 + +totalMarksArray.indexOf(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
					$('#' + id + 'Pos').val(pos);

				
				});
				
			});
			
			$(".container-fluid").on('blur', '.maths', function() {
				var numberOfStudents = $('.maths').length;
				var totalMathsScore = 0;
				var id = $(this).attr('id');
				$('.' + id + 'Total').val(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
				
				$('.maths').each(function() {
					totalMathsScore += +$(this).val();
				
				});
				
				$('#mathsTotal').val(totalMathsScore);
				$('#mathsMeanScore').val(Math.round((totalMathsScore / numberOfStudents)));
				
				var subjectMeanScoreArray = [$('#englishMeanScore').val(),$('#kiswahiliMeanScore').val(),$('#scienceMeanScore').val(),$('#socialStudiesMeanScore').val(),$('#mathsMeanScore').val()];
				subjectMeanScoreArray.sort(function(a, b){return b-a});
				$('#englishPosition').val(1 + +subjectMeanScoreArray.indexOf($('#englishMeanScore').val()));
				$('#kiswahiliPosition').val(1 + +subjectMeanScoreArray.indexOf($('#kiswahiliMeanScore').val()));
				$('#mathsPosition').val(1 + +subjectMeanScoreArray.indexOf($('#mathsMeanScore').val()));
				$('#sciencePosition').val(1 + +subjectMeanScoreArray.indexOf($('#scienceMeanScore').val()));
				$('#socialStudiesPosition').val(1 + +subjectMeanScoreArray.indexOf($('#socialStudiesMeanScore').val()));
				
				var totalMarks = 0;
				var totalMarksArray = [];
				
				$('.total').each(function() {
					totalMarksArray.push(+$(this).val());
					totalMarks += +$(this).val();
				
				});
				
				totalMarksArray.sort(function(a, b){return b-a});
				$('#total').val(totalMarks);
				$('#meanScore').val(Math.round(totalMarks / numberOfStudents));
				
				$('.total').each(function() {
					var id = $(this).attr('id');
					var pos = 1 + +totalMarksArray.indexOf(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
					$('#' + id + 'Pos').val(pos);

				
				});
				
			});

			$(".container-fluid").on('blur', '.science', function() {
				var numberOfStudents = $('.science').length;
				var totalScienceScore = 0;
				var id = $(this).attr('id');
				$('.' + id + 'Total').val(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
				
				$('.science').each(function() {
					totalScienceScore += +$(this).val();
				
				});
				
				$('#scienceTotal').val(totalScienceScore);
				$('#scienceMeanScore').val(Math.round((totalScienceScore / numberOfStudents)));
				
				var subjectMeanScoreArray = [$('#englishMeanScore').val(),$('#kiswahiliMeanScore').val(),$('#scienceMeanScore').val(),$('#socialStudiesMeanScore').val(),$('#mathsMeanScore').val()];
				subjectMeanScoreArray.sort(function(a, b){return b-a});
				$('#englishPosition').val(1 + +subjectMeanScoreArray.indexOf($('#englishMeanScore').val()));
				$('#kiswahiliPosition').val(1 + +subjectMeanScoreArray.indexOf($('#kiswahiliMeanScore').val()));
				$('#mathsPosition').val(1 + +subjectMeanScoreArray.indexOf($('#mathsMeanScore').val()));
				$('#sciencePosition').val(1 + +subjectMeanScoreArray.indexOf($('#scienceMeanScore').val()));
				$('#socialStudiesPosition').val(1 + +subjectMeanScoreArray.indexOf($('#socialStudiesMeanScore').val()));
				
				var totalMarks = 0;
				var totalMarksArray = [];
				
				$('.total').each(function() {
					totalMarksArray.push(+$(this).val());
					totalMarks += +$(this).val();
				
				});
				
				totalMarksArray.sort(function(a, b){return b-a});
				$('#total').val(totalMarks);
				$('#meanScore').val(Math.round(totalMarks / numberOfStudents));
				
				$('.total').each(function() {
					var id = $(this).attr('id');
					var pos = 1 + +totalMarksArray.indexOf(Math.round((+$('.' + id + 'english').val() + +$('.' + id + 'kiswahili').val() + +$('.' + id + 'science').val() + +$('.' + id + 'socialStudies').val() + +$('.' + id + 'maths').val() )));
					$('#' + id + 'Pos').val(pos);

				
				});
				
			});


		
		
		
		});
	
	
	</script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/plugins/morris/morris-data.js"></script>

</body>
</html>