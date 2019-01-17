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

			
			<?php foreach($galerie as $keyvid => $vid): ?>
				<?php if(!is_null($vid->item_videocode)): ?>
				<?php
					$a = explode('iframe', $vid->item_videocode);
					$b = explode('src', $a[1]);
					$c = explode('=', $b[1]);
					$d = explode(' ', $c[1]);
					$link = $d[0];

					$link = str_replace('"', '', $link);

					if ($link[0] == "/" && $link[1] == "/")
					{
						$link = "http:".$link;
					}

					$link = $link."?autoplay=1";
					
					
					echo '
						<div class="col-md-3 col-sm-4 col-sm-6 col-xs-6 img-small">
							<div class="media">
								<a class="videocl" id="various_' .$vid->id. '" href="' .$link. '"><img src="' .base_url().PATH_IMG_GALERIE_VIDEO. 'm/' .$vid->img. '" alt="" border="0" style="" class="img-responsive"/></a>
							</div>
							<br/>
							<label style="font-weight:400;max-height:100px;">' .$vid->item_name. '</label>
						</div>
					';

				?>
				<?php endif;?>
			<?php endforeach; ?>
			</div><!-- /row -->
		</div><!-- /gallery -->
		<?php endif; ?>		
		
	</section>
	<!-- content -->