<script src="<?=base_url();?>public/scripts/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.easing-1.3.pack.js"></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript">

function camColl(id) {

  var url = "<?=base_url()?>oferte/ajxroom/" +id;
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
