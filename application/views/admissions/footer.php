				<div class="row">
					<h1></h1>
					<h4></h4>
				</div>
				
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
		
		$(".container-fluid").on('change', '#coa', function(){
		
			$('div.streams').html('<button id="fat-btn" class="btn btn-primary" type="button">Loading...</button>');
		
			var form_data = {
				selected_class: $('#coa').val(),
				actionf: 'get_streams'

			};
			
			$.ajax({
				url: $('form').attr('action'),
				type: 'POST',
				data: form_data,
				success: function(msg) {
					$('div.streams').html(msg);
				
				},
				error : function(val1, val2, val3) {
					$('div.streams').html(val1, val2, val3);
				}
				
			});
		
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
	
	<script type="text/javascript">
	$(document).ready(function() {
	
		(".container-fluid").on('blur', '#f_name', function() {
		
			alert('Hey');
			/*
			$("form#addNewStudent input").each(function(){
				 var input = $(this); // This is the jquery object of the input, do what you will
				 alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
				 
				 return false;
			});
			
			$( "form" ).on( "submit", function( event ) {
event.preventDefault();
console.log( $( this ).serialize() );
});

<script>
function showValues() {
var str = $( "form" ).serialize();
$( "#results" ).text( str );
}
$( "input[type='checkbox'], input[type='radio']" ).on( "click", showValues );
$( "select" ).on( "change", showValues );
showValues();
</script>
			var url = $(this).attr('action');
			
			$.ajax({
				url : url,
				data : input,
				type : 'POST',
				success : function(){
					alert('Succes');
				
				},
				error : function() {
					alert('Error');
				}
			
			});
			*/
		
		});
	
	});
	
	</script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>bootstrap/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/plugins/morris/morris-data.js"></script>

</body>
</html>