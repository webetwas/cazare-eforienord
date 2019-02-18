<?php if($camera->i): ?>
<script type="text/javascript">

$(document).ready(function() {
    $("a[rel=example_group]").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Imagine ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });

});
<!--fancybox-->
</script>
<?php endif; ?>


<?php if($camera->id_video): ?>

<script type="text/javascript">
function formatDate(date) {
	var d = new Date(date),
	month = '' + (d.getMonth() + 1),
	day = '' + d.getDate(),
	year = d.getFullYear();

	if (month.length < 2) month = '0' + month;
	if (day.length < 2) day = '0' + day;

	return [year, month, day].join('-');
}

$(document).ready(function () {

$('form#fcheckrez').submit(function(e){		
	var d_start = formatDate($('input[name="d_start"]').val());
	var d_end = formatDate($('input[name="d_end"]').val());
	var tip_camera_id = $('input[name="tip_camera_id"]').val();
	if($('input[name="d_start"]').val() == "CHECK IN" || $('input[name="d_end"]').val() == "CHECK OUT") {	
		alert("Completeaza datele pentru Check-in Check-out si Pret");
		e.preventDefault();
	} else if(Date.parse(d_end) < Date.parse(d_start)) {
		
		alert("Ai introdus datele gresit.")
		e.preventDefault();
	}
	$.ajax({
		url: "<?=base_url()?>camere/vericare_perioada_rezervata/"+d_start+"/"+d_end+"/"+tip_camera_id,		
		async: false,	
		success: function(result){ 
			if(result!="false"){
				e.preventDefault();	
				alert(result)
			}
		}
	});	
});
		$(".videocl").each(function() {
			$(this).fancybox({
				'autoPlay'    		: true,
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
			});
		});
});
<!--fancybox-->
</script>
<?php endif; ?>