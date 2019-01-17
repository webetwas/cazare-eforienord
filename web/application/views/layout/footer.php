<?php

// var_dump($menus_footer);die();

?>

<footer id="footer">

    <div class="container">

        <div class="row">

            <div class="col-sm-3 col-md-3 col-lg-3 hidden-xs">

                <!-- <img src="img/footer-logo.png" alt=""> -->
                <br>

                <?=$desprenoi_small?>

            </div>

            <!-- /col-md-3 -->

            <!-- /col-md-3 -->

            <div class="col-sm-6 col-md-6 col-lg-6">

                <div class="widget widget-contact">

            		<div class="text-center hidden-lg hidden-md hidden-sm">

									<?php if($this->router->fetch_class() != "rezervari"): ?>

	            		<a href="<?=base_url()?>rezervari" class="btn btn-primary btn-rezerva">Rezerva Acum</a>

									<?php endif;?>

	            	</div>

                    <h5><?=$owner->titlucompanie;?></h5>

                    <div class="address">

                        <i class="fa fa-home"></i>

                        <p><?=$company->adresa_pl?>, <?=$company->adresa_plloc?>, <?=$company->adresa_pljud?> <?=$company->adresa_plcodpostal?></p>

                    </div>

                    <!-- /address -->

                    <div class="phone">

                        <i class="fa fa-phone"></i>

                        <p>
                            <a href="tel:<?=$company->telefon_mobil?>"><?=$company->telefon_mobil?></a><br />
                            <a href="tel:<?=$company->telefon_fix?>"><?=$company->telefon_fix?></a>
                        </p>

                    </div>

                    <!-- /phone -->

                    <!-- <div class="time">

						<i class="fa fa-clock-o"></i>

						<p>08-16 hours<br>Monday - Friday</p>

					</div> -->

                    <div class="email">

                        <i class="fa fa-envelope-o"></i>

                        <p>
                            <a href="mailto:<?=$owner->oemail?>"><?=$owner->oemail?></a>
                        </p>

                    </div>

                    <!-- /email -->

                </div>

                <!-- /widget-contact -->

            </div>

            <!-- /col-md-3 -->

            <div class="col-sm-3 col-md-6 col-lg-3 hidden-xs">

                <div class="widget widget-newsletter">

                    <h5>Newsletter</h5>

                    <form method="POST" action="<?=base_url()?>contact/newsletter">

                        <input type="text" name="numeprenume" placeholder="Nume Prenume" required>

                        <input type="email" name="email" placeholder="Adresa E-mail" required>

                        <button type="submit" name="nlettsub" role="button" class="btn btn-primary" style="padding:14px;margin-top: 15px;background:#233643;color:#999999;width: 100%;">Trimite</button>

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

                    <a href="<?=$owner->facebook?>" target="_blank"><i class="fa fa-facebook"></i></a>

                    <a href="<?=$owner->youtube?>" target="_blank"><i class="fa fa-youtube"></i></a>

                </div>

                <!-- /footer-social -->

            </div>

            <!-- /col-md-3 -->

						<?php if(!is_null($menus_footer)): ?>

            <div class="col-sm-5 col-md-5 col-lg-5">

                <nav class="footer-nav">

                    <ul>

										<?php foreach($menus_footer as $menu_footer): ?>

										<?php

											if($menu_footer->item->fullpath == "/" || $menu_footer->item->fullpath == "acasa" || $menu_footer->item->fullpath == "homepage" || $menu_footer->item->fullpath == "index" || $menu_footer->item->fullpath == "index.php") $menu_footer->item->fullpath = "";

										?>										

										

                        <li><a href="<?=base_url().$menu_footer->item->fullpath?>"><?=$menu_footer->item->item_name?></a></li>

										<?php endforeach; ?>

                    </ul>

                </nav>

            </div>

						<?php endif; ?>

            <!-- /col-md-5 -->

            <div class="col-sm-4 col-md-4 col-lg-4">
                <p class="copyright">&copy; <?=date('Y'); ?> <?=$owner->company?>. Toate drepturile rezervate</p>
            </div>

            <!-- /col-md-4 -->

        </div>

        <!-- /row -->

    </div>

    <!-- /container -->

</div>

<!-- /copyright-section -->
<div class="copyright-section-by">
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                Realizat de 
                <a href="www.webetwas.com" target="_blank">
                    <img src="../web/public/assets/img/webetwas-logo-white.png">
                </a>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>