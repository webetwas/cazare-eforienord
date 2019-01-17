<?php if(!is_null($galerie)): ?>
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