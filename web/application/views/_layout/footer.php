<!-- SCRIPTS -->

<!-- jQuery -->
<!-- CUSTOM JavaScript so you can use jQuery or $ before it has been loaded in the footer. -->
<script>
(function(w, d, u) { w.readyQ = [];
    w.bindReadyQ = [];

    function p(x, y) { if (x == "ready") { w.bindReadyQ.push(y); } else { w.readyQ.push(x); } }; var a = { ready: p, bind: p };
    w.$ = w.jQuery = function(f) { if (f === d || f === u) { return a } else { p(f) } } })(window, document)
</script>
<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<script src="<?=base_url();?>public/assets/js/vendor/jquery-1.11.0.min.js"></script>
<!-- CUSTOM JavaScript so you can use jQuery or $ before it has been loaded in the footer. -->
<script>
(function($, d) { $.each(readyQ, function(i, f) { $(f) });
    $.each(bindReadyQ, function(i, f) { $(d).bind("ready", f) }) })(jQuery, document)
</script>
<!-- Google Maps Plugin -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=true"></script>
<script src="<?=base_url();?>public/assets/js/vendor/maplace.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src='<?=base_url();?>public/assets/bootstrap/js/bootstrap.min.js'></script>
<!-- Custom Bootstrap Select Dropdown Javascript -->
<script type="text/javascript" src="<?=base_url();?>public/assets/js/vendor/bootstrap-select.min.js"></script>
<!-- Custom Bootstrap Datepicker Javascript -->
<script type="text/javascript" src="<?=base_url();?>public/assets/js/vendor/picker.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/assets/js/vendor/picker.date.js"></script>
<!-- Main JavaScript File for the theme -->
<script src='<?=base_url();?>public/assets/js/scripts.js'></script>
<!-- Shortcodes JavaScript File for the theme -->
<script src='<?=base_url();?>public/assets/js/shortcodes.js'></script>
<!-- widgets/footer-widgets JavaScript File for the theme -->
<script src='<?=base_url();?>public/assets/js/widgets.js'></script>
<!-- Newsletter Shortcode DEPENDANCY JS -->
<script src='<?=base_url();?>public/assets/js/vendor/classie.js'></script>
<script src='<?=base_url();?>public/assets/js/vendor/modernizr.custom.js'></script>
<!-- Newsletter Shortcode main JS -->
<script src='<?=base_url();?>public/assets/js/vendor/newsletter.js'></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.easing-1.3.pack.js"></script>
<script src="<?=base_url();?>public/scripts/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<!-- Owl Carousel Main Js File -->
<script src="<?=base_url();?>public/assets/js/vendor/owl.carousel.js"></script>

<!-- /SCRIPTS -->

	<script type="text/javascript">
		$(document).ready(function() {
				$("#suitcase").fancybox({
						'transitionIn'      : 'none',
						'transitionOut'     : 'none',

				});

		});
		<!--fancybox-->	
	</script>