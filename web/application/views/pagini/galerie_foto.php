<?php

// var_dump($page);die();
// var_dump($galerie);die();
?>
	<section id="content">
		<h1 class="col8"><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></h1>

		<?=(!is_null($page->p->content_ro) ? $page->p->content_ro : "")?>
		
		<hr>
		
		<?php if(!is_null($galerie)): ?>
		<div class="gallery">
			<div class="row">

			
			<?php foreach($galerie as $keyimg => $img): ?>

				<?php
					echo '
					<div class="col-sm-4 col-md-4 col-lg-4 img-small">
						<div class="media">
							<a href="' .base_url().PATH_IMG_GALERIE_FOTO. 'l/' .$img->img. '" rel="example_group">
							<img src="' .base_url().PATH_IMG_GALERIE_FOTO. 'm/' .$img->img. '" data-src="' .base_url().PATH_IMG_GALERIE_FOTO. 'm/' .$img->img. '" alt="" border="0" style="" class="img-responsive"/></a>
						</div>
					</div>';
										
					

				?>
			
			<?php endforeach; ?>
			</div><!-- /row -->
		</div><!-- /gallery -->
		<?php endif; ?>		
		
	</section>
	<!-- content -->