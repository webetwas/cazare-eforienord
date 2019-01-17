<?php
// var_dump($rez->camere);die();
echo '<pre>';
var_dump($page);
echo '</pre>';
?>
	<section id="content" style="padding-left:20px;padding-top:30px;">
		<h1 class="col8"><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></h1>
		<div id="rezbd">
			<div class="booking-area" style="margin-bottom:30px;">
					<div class="container">
							<div class="row">
									<div class="col-lg-8">
											<form action="<?=base_url()?>rezervari" method="POST" id="fcheckrez">
													<div class="col-lg-4">
															<input type="text" class="datepicker" name="d_start" value="<?=(!is_null($rez->d_start) ? $rez->d_start : 'Data Check-in')?>" data-date-format="dd/mm/yy" required>
													</div>
													<!-- /col-md-2 -->
													<div class="col-lg-4">
															<input type="text" class="datepicker" name="d_end" value="<?=(!is_null($rez->d_start) ? $rez->d_end : 'Data Check-out')?>" data-date-format="dd/mm/yy" required>
													</div>
													<div class="col-lg-4">
															<button type="submit" name="d_submit" class="btn btn-primary">Cauta camere disponibile..</button>
													</div>
													<!-- /col-md-2 -->
											</form>
									</div>
									<!-- /col-md-12 -->
							</div>
							<!-- /row -->
							
							
					</div>
					<!-- /container -->
			</div>
			<!-- /booking-area -->

						<?php if(!is_null($rez->camere)): ?>
							<h2 style="text-align:center;">Am gasit <?=count($rez->camere)?> rezultat(e) in urma cautarilor tale:</h2>
							<hr>
						<?php elseif(!is_null($rez->d_start) && !is_null($rez->d_end)): ?>
							<h2 style="text-align:center;">Nu am gasit rezultate in urma cautarilor tale.</h2>
							<hr>
						<?php endif; ?>
						
						
						<?php if(!is_null($rez->camere)): ?>
							<?php foreach($rez->camere as $camera): ?>
							<div class="row" style="margin-left:5px;">

								<div class="checkout-info row">
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
												<span class="checkout-title">Camera:</span>
												<span class="checkout-value"><a href="<?=base_url()?>camera/<?=$camera->http_id?>" target="_blank"><?=(!is_null($camera->titlu_prezentare) ? $camera->titlu_prezentare : $camera->item_name )?></a></span>
										</div>
										<!-- /col-3 -->
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
												<span class="checkout-title">CHECK IN:</span>
												<span class="checkout-value"><?=$rez->d_start?></span>
										</div>
										<!-- /col-3 -->
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
												<span class="checkout-title">CHECK OUT:</span>
												<span class="checkout-value"><?=$rez->d_end?></span>
										</div>
										<!-- /col-3 -->
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
												<span class="checkout-title">Pret /zi</span>
												<span class="checkout-value"><?=$camera->pret?> Lei</span>
										</div>
										<!-- /col-3 -->
								</div>
								
								<div class="row pull-right" style="margin-bottom:40px;">
									<form action="<?=base_url()?>rezervari/rezerva_camera/<?=$camera->http_id?>" method="post">
										<input type="hidden" name="rezpdata" value="<?=base64_encode(json_encode(array("id_item" => $camera->id_item, "id_interval" => $camera->id_interval, "d_start" => $rez->d_start, "d_end" => $rez->d_end)))?>" />
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:10px;">
											<button class="btn btn-info" type="button" id="btncamcoll-<?=$camera->id_item?>" data-toggle="collapse" data-target="#camcoll-<?=$camera->id_item?>" aria-expanded="false" aria-controls="camcoll-<?=$camera->id_item?>" onClick="return camColl(<?=$camera->id_item?>);">Vezi camera <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
										</div>							
									
									
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:10px;">
											<button type="submit" name="rezpsubmit" class="btn btn-primary">Rezerva acum!</button>
										</div>
									</form>
									
								</div>
								
							</div>
							<!-- cam collapse -->
							<div class="row">
								<div class="collapse" id="camcoll-<?=$camera->id_item?>">
									<div class="well">
										...
									</div>
								</div>
							</div>
							<!-- cam collapse -->
							<hr style="margin:5px;">
							<?php endforeach; ?>
						<?php endif; ?>
		</div>
						
						
	</section>