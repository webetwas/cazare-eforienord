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

$(document).ready(function () {
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