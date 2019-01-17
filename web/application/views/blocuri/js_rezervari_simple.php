<script type="text/javascript">

$('form#fcheckrez').submit(function(e){
	
	var d_start = $('input[name="d_start"]').val();
	var d_end = $('input[name="d_end"]').val();

	
	if(!Date.parse(d_start) || !Date.parse(d_end)) {
		
		alert("Completeaza datele pentru Check-in si Check-out");
		e.preventDefault();
	} else if(Date.parse(d_end) < Date.parse(d_start)) {
		
		alert("Ai introdus datele gresit.")
		e.preventDefault();
	}
});
</script>