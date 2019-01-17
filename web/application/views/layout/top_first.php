<?php
// var_dump($weather);
?>
<div class="col-sm-4 col-md-4 col-lg-4">
	<div class="footer-social text-center hidden-lg hidden-ms hidden-md">
			<a href="<?=$owner->facebook?>" target="_blank"><i class="fa fa-facebook"></i></a>
			<a href="<?=$owner->youtube?>" target="_blank"><i class="fa fa-youtube"></i></a>
			<a href="mailto:<?=$owner->oemail?>"><i class="fa fa-envelope"></i></a>
			<a href="tel:<?=$company->telefon_mobil?>"><i class="fa fa-phone"></i></a>
	</div>
	<a class="logo text-center monotype" href="<?=base_url()?>">San Pantaleo Rooms<br /> Eforie Nord</a><!-- /logo -->
	<br />
	<div class="footer-social text-center hidden-xs hidden-md">
			<a href="<?=$owner->facebook?>" target="_blank"><i class="fa fa-facebook"></i></a>
			<a href="<?=$owner->youtube?>" target="_blank"><i class="fa fa-youtube"></i></a>
			<a href="mailto:<?=$owner->oemail?>"><i class="fa fa-envelope"></i></a>
			<a href="tel:<?=$company->telefon_mobil?>"><i class="fa fa-phone"></i></a>
	</div>
</div><!-- /4 columns -->
<a class="nav-toggle pull-right"><i class="icon-menu"></i></a>
<nav class="col-sm-12 clear" id="mobile-nav"></nav>
<div class="col-sm-12 col-md-8 col-lg-8">
	<div class="elements">
			<!-- <div class="language element">
					<p>thank you lord</p>
			</div>-->
		<div class="weather element">
			<p><?=$date_today?> <!--<i class="icon-sun-1"></i> 31&deg;C/88&deg;F-->
			<?php
			if(!is_null($weather)):
			?>
			<img src="<?=$weather->icon?>" width="40" height="40" /> <?=$weather->temp_c?>&deg;C&nbsp;&nbsp;<?=$weather->temp_f?>&deg;F
			<?php
			endif;
			?>
			</p>
		</div><!-- /weather -->
		<div class="header-info element">
			<div class="info">
				<p data-id="1">
					<strong>Tel:</strong>
					<a href="tel:<?=$company->telefon_mobil?>"> <?=$company->telefon_mobil?></a>
				</p>
				<p data-id="2">
					<strong>Locatie:</strong> 
					<?=$company->adresa_pl?>, <?=$company->adresa_plloc?>
				</p>
				<p data-id="3">
					<strong>Email:</strong> 
					<a href="mailto:<?=$owner->oemail?>"><?=$owner->oemail?></a>
				</p>
			</div><!-- /info -->
			<div class="triggers">
				<i data-id="1" class="icon-tablet-2"></i>
				<i data-id="2" class="icon-location"></i>
				<i data-id="3" class="icon-globe-3"></i>
			</div><!-- /triggers -->
		</div><!-- /header-info -->
	</div><!-- /elements -->
</div><!-- /col-sm-8 -->