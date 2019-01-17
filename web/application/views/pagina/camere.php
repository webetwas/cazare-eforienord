<section id="content">
	<h1 class="col8"><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></h1>
	
	<?php if(is_null($camere)): echo '<h2>Nu exista iteme pentru afisare.</h2>'; ?>
	<?php elseif(!is_null($camere)): ?>
		
		<?php $ctrprd = 0; foreach($camere as $camera): $ctrprd++; ?>
		<?php if($ctrprd === 3): ?>
		<div class="row" style="margin-bottom:5px;">
		<?php endif; ?>
		<div class="col-sm-4 col-md-4 col-lg-4">
			<div class="servicebox">
				<div class="servicebox-content">
					<h3><a href="<?=base_url()?>camera/<?=$camera->http_id?>"><?=$camera->item_name?></a></h3>
					<p><?=substr($camera->i_content_ro, 0, 150)?></p>
					
				</div><!-- /servicebox-content -->
				<?php if($camera->i): ?>
				<img src="<?=base_url().PATH_IMG_CAMERE. 'm/' .$camera->i[0]->img?>" alt="<?=$camera->item_name?>">
				<?php else: ?>
				<img src="<?=base_url()?>public/assets/img/preview-images/features_01.jpg" alt="<?=$camera->item_name?>">
				<?php endif; ?>
			</div><!-- /servicebox -->
		</div><!-- /col-sm-3 -->
		<?php if($ctrprd === 3): $ctrprd = 0;?>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>

	<?php endif; ?>
</section>