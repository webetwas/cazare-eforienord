<?php
// echo '<pre>';
// var_dump($page);
// echo '</pre>';

// die();
?>
	<section id="content">
		<h1 class="col8"><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></h1>
		
		<?php if(!is_null($page->i)): ?>
		<div class="gallery">

			<div class="row">

			<?php foreach($page->i as $keyimg => $img): ?>

				<?php

					echo '

					<div class="col-sm-3 col-md-3 col-lg-3 img-small">

						<div class="media">

							<a href="' .base_url().PATH_IMG_PAGINA. 'l/' .$img->img. '" rel="example_group">

							<img src="' .base_url().PATH_IMG_PAGINA. 'm/' .$img->img. '" data-src="' .base_url().PATH_IMG_PAGINA. 'm/' .$img->img. '" alt="" border="0" style="" class="img-responsive"/></a>

						</div>

					</div>';

				?>

			<?php endforeach; ?>

			</div><!-- /row -->

		</div><!-- /gallery -->	
		<br />
		<?php endif; ?>
		
		
		<?=(!is_null($page->p->content_ro) ? $page->p->content_ro : "")?>
	</section>
	<!-- content -->