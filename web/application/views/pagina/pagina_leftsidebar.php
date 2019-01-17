<?php

// var_dump($camere);

?>

<aside id="sidebar">

	<?php if((bool)$camere): ?>

	<div class="widget widget-sidebar-menu hidden-xs hidden-sm">

		<h5>Camerele noastre</h5>

		<ul>

			<?php foreach($camere as $camera): ?>

			<li><a href="<?=base_url()?>camera/<?=$camera->item->http_id?>"><?=$camera->item->item_name?><span class="glyphicon glyphicon-chevron-right"></span></a></li>

			<?php endforeach; ?>

		</ul>

	</div><!-- /widget-sidebar-menu -->

	<?php endif; ?>

	

	<div class="widget widget-button hidden-xs hidden-sm">

		<a href="<?=base_url()?>public/upload/img/misc/<?=$owner->image_logo?>" id="suitcase">

		<i class="fa fa-suitcase"></i>

			<span>Brosura San Pantaleo</span>

		</a>

	</div><!-- /widget-button -->



	<div class="widget widget-contact hidden-xs hidden-sm">

		<h5>Contact</h5>



		<div class="address">

			<i class="fa fa-home"></i>

			<p><?=$company->adresa_pl?>, <?=$company->adresa_plloc?>, <?=$company->adresa_pljud?> <?=$company->adresa_plcodpostal?></p>

		</div><!-- /address -->



		<div class="phone">

			<i class="fa fa-phone"></i>

			<p><?=$company->telefon_mobil?><br /><?=$company->telefon_fix?></p>

		</div><!-- /phone -->



		<div class="time">

			<i class="fa fa-clock-o"></i>

			<p>24 / 7 zile<br>Luni - Duminica</p>

		</div><!-- /time -->



		<div class="email">

			<i class="fa fa-envelope-o"></i>

			<p style="margin-left:-15px;"><?=$owner->oemail?></p>

		</div><!-- /email -->

		

	</div><!-- /widget-contact -->

</aside>