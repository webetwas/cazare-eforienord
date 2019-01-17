<?php
// echo "<pre>";
// var_dump($sliders);
// echo "<pre>";
// die();
?>
<?php if(!is_null($sliders)): ?>
<div class="big-slider">
	<div id="big-slider-carousel" class="carousel slide" data-ride="carousel">
			<a class="left carousel-nav" href="#big-slider-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-nav" href="#big-slider-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			<!-- Indicators -->
			<ol class="carousel-indicators">
					<li data-target="#big-slider-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#big-slider-carousel" data-slide-to="1"></li>
					<li data-target="#big-slider-carousel" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php $counter = 0; foreach($sliders as $keyslider => $slider): ?>
				
					<div class="item <?=($counter == 0 ? 'active' : '')?>">
							<img src="<?=base_url().PATH_IMG_BANNERS.$slider->img?>" style="width:100%;" />
							<div class="container">
									<div class="carousel-text">
										<?=(!empty($slider->titlu) ? '<h3>' .$slider->titlu. '</h3>' : '')?>
										<br>
										<?=(!empty($slider->subtitlu) ? '<h3>' .$slider->subtitlu. '</h3>' : '')?>
									</div>
							</div>
							<!-- /container -->
					</div>
					<!-- /item -->
				<?php $counter++; endforeach; ?>
			</div>
			<!-- /carousel-inner -->
	</div>
	<!-- /big-slider-carousel -->
</div><!-- /big-slider -->
<?php endif; ?>