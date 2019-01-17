<script type="text/javascript">
$( ".abmenu" ).change(function() {
  var thisid = $(this).attr('id');
  ajxtoggle(thisid);
	console.log("thisid", thisid);
});

function ajxtoggle(id = null) {
  var url = "<?=base_url().$controller_ajax;?>ajaxtoggle/id/" +id;

  $.ajax({
    url: url,
    dataType: "JSON",
    type: 'GET',
    beforeSend: function() {
     $(".cssload-container").show();
    },
    success: function( data ) {
      if(data.status == 1) {
				console.log("ok");
				
        $(".cssload-container").hide();
      } else if(data.status == 0) {
        //
      }
      // $.map(data, function(item) {
      //  // var = item.item;
      // })

    }
  });
}
</script>