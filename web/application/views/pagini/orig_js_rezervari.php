<script src="<?=base_url();?>public/scripts/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.easing-1.3.pack.js"></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script src="<?=base_url();?>public/scripts/realperson/jquery.plugin.js"></script>
<script src="<?=base_url();?>public/scripts/realperson/jquery.realperson3.js"></script>

<script type="text/javascript">

<?php
if(isset($rez->d_start) && !is_null($rez->d_start)):
?>
$(document).ready(function() {
		var idhtml = 'rezbd';
    var element = document.getElementById(idhtml);
		if(element)
			element.scrollIntoView();
		
		$('#captcha').realperson({length: 4});
});
<?php endif; ?>

$('form#submitrezvr').submit(function(e){
	
	var adulti = $('select[name="adulti"]').val();
	var copii = $('select[name="copii"]').val();
	
	if(!$.isNumeric(adulti) && !$.isNumeric(copii)) {
		
		alert("Completeaza Adulti/Copii participanti");
		
		e.preventDefault();
	}

});

$('form#fcheckrez').submit(function(e){
	
	var d_start = $('input[name="d_start"]').val();
	var d_end = $('input[name="d_end"]').val();
	
	if(!Date.parse(d_start) || !Date.parse(d_end)) {
		
		alert("Completeaza datele pentru Check-in si Check-out");
		e.preventDefault();
	} else if(Date.parse(d_end) < Date.parse(d_start) || Date.parse(d_end) == Date.parse(d_start)) {
		
		alert("Ai introdus datele gresit.")
		e.preventDefault();
	}
});

function camColl(id) {

  var url = "<?=base_url()?>rezervari/ajxroom/" +id;
  $.ajax({
    url: url,
    dataType: "JSON",
    type: 'GET',
    // beforeSend: function() {
			// showloader();
    // },
    success: function( data ) {
      if(data.status == 1) {
				
				$('#camcoll-' +id+ ' .well').html(data.html);
				$('body').append(data.js);
				$("button#btncamcoll-" +id).prop("onclick", null);

      } else if(data.status == 0) {
        //
      }
    }
  });

}
</script>
