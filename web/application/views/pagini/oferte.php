<?php
// var_dump($rez->oferte);die();
?>
	<section id="content" style="padding-left:20px;padding-top:30px;">
		<h1 class="col8" style="margin-bottom:50px;"><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></h1>
		<?=(!is_null($page->p->content_ro) ? '<p>' .$page->p->content_ro. '</p>' : "")?>
		<div id="rezbd" style="padding-left:20px;">

						
						
						<?php if(!is_null($rez->oferte)): ?>
							<?php foreach($rez->oferte as $oferta): ?>
							<div class="row" style="margin-left:1px;">

								<div class="checkout-info row">
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-6">
												<span class="checkout-value" style="color:#259aad;"><?=$oferta->offer_titlu?></span>
												<hr style="margin:0;">
										</div>
										<!-- /col-3 -->
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-6">
												<span class="checkout-title">In perioada:</span>
												<span class="checkout-value"><?=date_format(date_create($oferta->date_start), 'd.m.Y');?> - <?=date_format(date_create($oferta->date_end), 'd.m.Y');?></span>
										</div>
										<!-- /col-3 -->
								</div>
								
								<div class="row" style="margin-bottom:40px;">
								
									<div class="col-sm-6">
										<p><?=$oferta->offer_content?></p>
									</div>
								
									<div class="col-sm-6">

											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:10px;">
												<button class="btn btn-info" type="button" id="btncamcoll-<?=$oferta->id_item?>" data-toggle="collapse" data-target="#camcoll-<?=$oferta->id_item?>" aria-expanded="false" aria-controls="camcoll-<?=$oferta->id_item?>" onClick="return camColl(<?=$oferta->id_item?>);">Vezi camera <i class="fa fa-chevron-down" aria-hidden="true"></i></button>
											</div>
											
											<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:10px;">
												<a type="button" class="btn btn-primary" href="<?=base_url()?>rezervari">Rezerva acum!</a>
											</div>
									</div>
								</div>
								
							</div>
							<!-- cam collapse -->
							<div class="row">
								<div class="collapse" id="camcoll-<?=$oferta->id_item?>">
									<div class="well">
										...
									</div>
								</div>
							</div>
							<!-- cam collapse -->
							<hr style="margin-bottom:30px;">
							<?php endforeach; ?>
						<?php endif; ?>
		</div>
						
						
	</section>