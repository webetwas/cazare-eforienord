<?php

// echo '<pre>';
// var_dump($camera);
// echo '<pre>';
// die();

?>

	<section id="content">
	

		

		<div class="row">
			<h1 class="col8"><?=$camera->titlu_prezentare?></h1>
		</div>		

		<div class="row">
				<div class="col-lg-12">
						<form action="<?=base_url()?>rezervari" method="POST" id="fcheckrez">
								<div class="col-lg-4">
										<input type="text" name="d_start" class="datepicker" value="CHECK IN" data-date-format="dd/mm/yy" required>
								</div>
								<!-- /col-md-2 -->
								<div class="col-lg-4">
										<input type="text" name="d_end" class="datepicker" value="CHECK OUT" data-date-format="dd/mm/yy" required>
								</div>
								<!-- /col-md-2 -->

								<!-- /col-md-2 -->
								<div class="col-lg-4">
										<button type="submit" name="d_submit" class="btn btn-primary">Rezerva acum!</button>
								</div>
								<!-- /col-md-2 -->
						</form>
				</div>
				<!-- /col-md-12 -->
		</div>
		<!-- /row -->
		<hr>
		


		<div class="row">

			<div class="col-sm-<?=($camera->id_video ? '6' : '12')?>">

				<p><?=$camera->i_content_ro?></p>

			</div>

			
			
				
			<?php if($camera->id_video): ?>
			<h3 style="color:#259aad;">Vizioneaza video</h3>
			<div class="col-sm-<?=(($camera->id_video2) ? '3' : '6')?>" style="border-left:1px solid #ccc;">

				

				

				<?php

					$a = explode('iframe', $camera->video->item_videocode);

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

					if($camera->id_video2) {
					$a = explode('iframe', $camera->video2->item_videocode);

					$b = explode('src', $a[1]);

					$c = explode('=', $b[1]);

					$d = explode(' ', $c[1]);

					$link2 = $d[0];



					$link2 = str_replace('"', '', $link2);



					if ($link2[0] == "/" && $link2[1] == "/")

					{

						$link2 = "http:".$link2;

					}



					$link2 = $link2."?autoplay=1";						
						
					}

				?>



						<div class="media">

							<a class="videocl" id="<?=$camera->video->id_item?>" href="<?=$link?>"><img src="<?=base_url().PATH_IMG_GALERIE_VIDEO. 'm/' .$camera->video->i->img?>" alt="" border="0" style="" class="img-responsive"/></a>

						</div>

				

			</div>
			
				<?php if($camera->id_video2): ?>
				<div class="col-sm-3">
					<div class="media">

						<a class="videocl" id="<?=$camera->video2->id_item?>" href="<?=$link2?>"><img src="<?=base_url().PATH_IMG_GALERIE_VIDEO. 'm/' .$camera->video2->i->img?>" alt="" border="0" style="" class="img-responsive"/></a>

					</div>
				</div>
				<?php endif; ?>
						
			<?php endif; ?>

		</div>

		<div class="row">
			
			<?php foreach($camera->camere_intervale as $keycamere => $c): ?>			
				<div class="col-lg-12">
					<?php				
						echo("<b>".date_format(date_create($c->date_start), 'd-m-Y'))."</b> - ";
						echo("<b>".date_format(date_create($c->date_end), 'd-m-Y'))."</b>";
						echo " Pret: ";
						echo("<b>".$c->pret)."</b>";
					?>	
					<button type="submit" name="d_submit" class="btn btn-primary">Rezerva acum!</button>
					<br>				
				</div>
			<?php endforeach; ?>
		</div>



		<?php if($camera->i): ?>

		<hr>

		<div class="gallery">

			<div class="row">

			<h3 style="color:#259aad;">Imagini camera</h3>

			

			<?php foreach($camera->i as $keyimg => $img): ?>



				<?php

					echo '

					<div class="col-sm-3 col-md-3 col-lg-3 img-small">

						<div class="media">

							<a href="' .base_url().PATH_IMG_CAMERE. 'l/' .$img->img. '" rel="example_group">

							<img src="' .base_url().PATH_IMG_CAMERE. 'm/' .$img->img. '" data-src="' .base_url().PATH_IMG_CAMERE. 'm/' .$img->img. '" alt="" border="0" style="" class="img-responsive"/></a>

						</div>

					</div>';

										

					



				?>

			

			<?php endforeach; ?>

			</div><!-- /row -->

		</div><!-- /gallery -->

		<?php endif; ?>



	</section><!-- content -->