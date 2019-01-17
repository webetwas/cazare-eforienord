<?php
// var_dump($oferte);die();
?>
<?php if(!is_null($oferte)): ?>
<div class="footerbox">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-4">

            </div>
            <!-- /col-md-3 -->
            <div class="col-sm-3 col-md-3 col-lg-2">
                <div class="footerbox-social">
                    <a href="<?=$owner->facebook?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="<?=$owner->youtube?>" target="_blank"><i class="fa fa-youtube"></i></a>
                </div>
                <!-- /footerbox-social -->
            </div>
            <!-- /col-md-3 -->
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="footercarousel carousel slide" id="footercarousel" data-ride="carousel">
                    <div class="carousel-inner">
										<?php foreach($oferte as $keyoferta => $oferta): ?>
										
                        <div class="item <?=$keyoferta === 0 ? 'active' : ""?>">
                            <i class="fa fa-calendar-o"></i><small class="date"><?=date_format(date_create($oferta->date_start), 'd.m.Y')?></small>
                            <h3><a href="<?=base_url()?>oferte" style="color:black;text-decoration:underline;" target="_blank"><?=(!is_null($oferta->offer_titlu) ? $oferta->offer_titlu : $oferta->item_name)?></a></h3>
                        </div>
                        <!-- /item -->
												
										<?php endforeach; ?>
                    </div>
                    <!-- /carousel-inner -->
                    <a class="footercarousel-controls top" href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a class="footercarousel-controls" href="#footercarousel" data-slide="prev">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </div>
                <!-- /footercarousel -->
            </div>
            <!-- /col-md-6 -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /footerbox -->
<?php endif; ?>