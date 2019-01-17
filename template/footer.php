<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-3 hidden-xs">
                <!-- <img src="img/footer-logo.png" alt=""> -->
                <br>
                <br>
                <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim a luat o planşetă de litere şi le-a amestecat pentru a crea o carte demonstrativă pentru literele respective. Nu doar că a supravieţuit timp de cinci secole, dar şi a facut saltul în tipografia electronică practic neschimbată. A fost popularizată în anii '60</p>
            </div>
            <!-- /col-md-3 -->
            <!-- /col-md-3 -->
            <div class="col-sm-6 col-md-6 col-lg-6">
            		
                <div class="widget widget-contact">
            		<div class="text-center hidden-lg hidden-md hidden-sm">
	            		<a href="" class="btn btn-primary btn-rezerva">Rezerva Acum</a>
	            	</div>
                    <h5>San Pantaleo Rooms | EFORIE NORD</h5>
                    <div class="address">
                        <i class="fa fa-home"></i>
                        <p>Str. Panselelor nr. 10, Eforie Nord, Romania</p>
                    </div>
                    <!-- /address -->
                    <div class="phone">
                        <i class="fa fa-phone"></i>
                        <p>+40 761 139 150<br>+40 761 139 150</p>
                    </div>
                    <!-- /phone -->
                    <!-- <div class="time">
						<i class="fa fa-clock-o"></i>
						<p>08-16 hours<br>Monday - Friday</p>
					</div> -->
                    <div class="email">
                        <i class="fa fa-envelope-o"></i>
                        <p>rooms@sanpantaleo.ro<br>rooms@sanpantaleo.ro</p>
                    </div>
                    <!-- /email -->
                </div>
                <!-- /widget-contact -->
            </div>
            <!-- /col-md-3 -->
            <div class="col-sm-3 col-md-6 col-lg-3 hidden-xs">
                <div class="widget widget-newsletter">
                    <h5>Newsletter</h5>
                    <form method="get" action="#">
                        <input type="text" name="name" placeholder="Nume Prenume">
                        <input type="email" name="email" placeholder="Email">
                        <a type="button" class="btn btn-primary">Trimite</a>
                    </form>
                </div>
                <!-- /widget-newsletter -->
            </div>
            <!-- /col-md-3 -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /main-footer -->
<div class="copyright-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
                <!-- /footer-social -->
            </div>
            <!-- /col-md-3 -->
            <div class="col-sm-5 col-md-5 col-lg-5">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="#">Acasa</a></li>
                        <li><a href="#">Despre noi</a></li>
                        <li><a href="#">Galerie Foto</a></li>
                        <li><a href="#">Galerie Video</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /col-md-5 -->
            <div class="col-sm-4 col-md-4 col-lg-4">
                <p class="copyright">&copy;
                    <?php ('Y'); ?>San Pantaleo Rooms. Toate drepturile rezervate</p>
            </div>
            <!-- /col-md-4 -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /copyright-section -->
</section>
<!-- /wrapper -->
<!-- jQuery -->
<!-- CUSTOM JavaScript so you can use jQuery or $ before it has been loaded in the footer. -->
<script>
(function(w, d, u) { w.readyQ = [];
    w.bindReadyQ = [];

    function p(x, y) { if (x == "ready") { w.bindReadyQ.push(y); } else { w.readyQ.push(x); } }; var a = { ready: p, bind: p };
    w.$ = w.jQuery = function(f) { if (f === d || f === u) { return a } else { p(f) } } })(window, document)
</script>
<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
<script src="js/vendor/jquery-1.11.0.min.js"></script>
<!-- CUSTOM JavaScript so you can use jQuery or $ before it has been loaded in the footer. -->
<script>
(function($, d) { $.each(readyQ, function(i, f) { $(f) });
    $.each(bindReadyQ, function(i, f) { $(d).bind("ready", f) }) })(jQuery, document)
</script>
<!-- Google Maps Plugin -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=true"></script>
<script src="js/vendor/maplace.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src='bootstrap/js/bootstrap.min.js'></script>
<!-- Custom Bootstrap Select Dropdown Javascript -->
<script type="text/javascript" src="js/vendor/bootstrap-select.min.js"></script>
<!-- Custom Bootstrap Datepicker Javascript -->
<script type="text/javascript" src="js/vendor/picker.js"></script>
<script type="text/javascript" src="js/vendor/picker.date.js"></script>
<!-- Main JavaScript File for the theme -->
<script src='js/scripts.js'></script>
<!-- Shortcodes JavaScript File for the theme -->
<script src='js/shortcodes.js'></script>
<!-- widgets/footer-widgets JavaScript File for the theme -->
<script src='js/widgets.js'></script>
<!-- Newsletter Shortcode DEPENDANCY JS -->
<script src='js/vendor/classie.js'></script>
<script src='js/vendor/modernizr.custom.js'></script>
<!-- Newsletter Shortcode main JS -->
<script src='js/vendor/newsletter.js'></script>
<!-- Owl Carousel Main Js File -->
<script src="js/vendor/owl.carousel.js"></script>
</body>

</html>