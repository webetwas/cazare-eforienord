<?php
// var_dump($items);die();
?>


<?php
// var_dump($items);die();
?>

<style type="text/css">
.note-editable.panel-body {
	margin-left:0 !important;
	width:100% !important;
}

.middle-box h1 {
	font-size: 20px;
}

</style>

<div class="wrapper wrapper-content">
	<div class="middle-box text-center animated fadeInRightBig" style="margin-top:0;padding-top:0;max-width:1200px;">
		<div class="row">
				<div class="col-lg-12">
						<div class="wrapper wrapper-content animated fadeInUp">


										<?php if(is_null($items)): echo "Nu s-au gasit Iteme."; ?>
											<?php elseif(!is_null($items)): ?>
												
            <div class="fh-breadcrumb">

                <div class="fh-column">
                    <div>
                        <ul class="list-group elements-list">
														<?php foreach($items as $keyitem => $item): ?>
                            <li class="list-group-item <?=($keyitem == 0 ? 'active' : '')?>">
                                <a data-toggle="tab" href="#tab-cam<?=$item->id_item?>">
                                    <h1 style="color:#1ab394;"><?=(!is_null($item->titlu_prezentare) ? $item->titlu_prezentare : $item->item_name);?></h1>
                                    <div class="small m-t-xs">
                                    </div>
                                </a>
                            </li>
														<?php endforeach; ?>


                        </ul>

                    </div>
                </div>

                <div class="full-height">
                    <div class="full-height-scroll white-bg border-left">

                        <div class="element-detail-box">

                            <div class="tab-content">

																<?php foreach($items as $keyitem => $item): ?>
																<?php $html_rel = getSomeStringByInt("camcoll", $item->id_item); ?>
                                <div id="tab-cam<?=$item->id_item?>" class="tab-pane <?=($keyitem == 0 ? 'active' : '')?>">
									<div class="pull-right tooltip-demo">
											<a href="<?=base_url().$controller_fake?>/item/u/id/<?=$item->id_item?>" class="btn btn-white" data-toggle="tooltip" data-placement="top" title="Editeaza informatii camera"><i class="fa fa-pencil"></i> Editeaza</a>
											<a href="<?=base_url().$controller_fake?>/item/d/id/<?=$item->id_item?>" class="btn btn-danger ahrefaskconfirm" data-toggle="tooltip" data-placement="top" title="Sterge camera"><i class="fa fa-trash-o"></i> </a>
									</div>

                                    <h1 style="margin-top:0;margin-bottom:30px;font-weight:bold;">
                                        <?=(!is_null($item->titlu_prezentare) ? $item->titlu_prezentare : $item->item_name);?>
                                    </h1>
																		
																		
									<!-- TAB -->
									<div class="tabs-container" style="margin-bottom:30px;">

											<div class="tabs-left">
												<ul class="nav nav-tabs" style="text-align: left;">
													<li class="active">
														<a data-toggle="tab" style="color:#1c84c6;" href="#tab-<?=$item->id_item;?>-item"> <i class="fa fa-bank"></i> <?=$item->item_name;?></a>
													</li>
													<li class="" id="litabpc-<?=$item->id_item;?>">
														<a data-toggle="tab" href="#tab-<?=$item->id_item;?>-planificare">
														<i class="fa fa-file-archive-o"></i>Nu exista planificari</a>
													</li>
													<li class="">
														<a data-toggle="tab" href="#tab-<?=$item->id_item;?>-oferta">
															<i class="fa fa fa-asterisk"></i>Oferta
														</a>
													</li>
												</ul>
												<div class="tab-content ">
													<!-- tab-ID-item -->
													<div id="tab-<?=$item->id_item;?>-item" class="tab-pane active">
														<div class="panel-body">

															<div class="lightBoxGallery">
															<?php if($item->i): ?>
															<div class="media">
																<?php foreach($item->i as $img): ?>
																		
																		
															<div class="col-xs-12 col-sm-2 col-xs-12">
																<a href="<?=$imgpathitem. "l/" .$img->img?>" data-fancybox rel="<?=$html_rel?>">
																<img src="<?=$imgpathitem. "s/" .$img->img?>" data-src="<?=$imgpathitem. "s/" .$img->img?>" alt="" class="img-responsive"/></a>
																		</div>
																		
																		<?php endforeach; ?>
																		</div>
																	<?php else: ?>
																		<h3>Nu exista imagini atasate pentru aceasta Camera.</h3>
																	<?php endif; ?>

																	</div>

																</div>
														</div>
														<!-- tab-ID-item -->
																							
																							
																							<!-- tab-ID-planificare -->
																							
																							<div id="tab-<?=$item->id_item;?>-planificare" class="tab-pane">
																									<div class="panel-body">
																									
																										<div class="pull-right tooltip-demo">
																												<button class="btn btn-info" data-toggle="modal" data-target="#myModalPlanifcamera" title="Planificare noua" onClick="return setPlan(<?=$item->id_item;?>, 'new');"><i class="fa fa-pencil"></i> &nbsp;&nbsp;Planifica un interval nou</button>
																										</div>
																										
																										<h2 style="margin-top:0;text-align:left;">
																											Planificarea intervalelor si definirea pretului aferent
																										</h2>																										
																										
																										<div class="row">
																											<div class="col-md-12">

																												<div id="tbplanlist-<?=$item->id_item;?>" style="text-align:left;">
																												<h3>
																													<span class="font-normal">Nu exista planificari pentru aceasta camera. </span>
																												</h3>
																												</div>
																											
																											</div>
																										</div>
																									</div>
																							</div>
																							
																							<!-- tab-ID-planificare -->
																							
																							<!-- tab-ID-oferta -->
																							
																							<div id="tab-<?=$item->id_item;?>-oferta" class="tab-pane" style="text-align:left;">
																									<div class="panel-body">
																									
																										<h2 style="margin-top:0;">
																											Creaza oferta pentru aceasta camera
																										</h2>
																										
																										<form method="POST" id="form_camoff-<?=$item->id_item;?>">
																											
																											<div class="row">
																												<div class="col-md-12">
																													<div class="form-group">
																													<label>Titlu oferta</label> 					
																														<input type="text" placeholder="Titlul ofertei" name="offer_titlu" class="form-control" value="<?=(!is_null($item) && !is_null($item->offer_titlu) ? $item->offer_titlu : "");?>" required>
																													</div>
																												</div>
																											</div>

																											<div class="row">
																												<div class="col-md-12">
																													<div class="form-group">
																															<label><h3>Continut oferta</h3></label>
																																<textarea name="offer_content" id="offcontentro-<?=$item->id_item;?>" rows="4"><?=(!is_null($item) && !is_null($item->offer_content) ? $item->offer_content : "");?></textarea>
																													</div>
																												</div>
																											</div>																											
																											<button type="button" class="btn btn-primary" onClick="return offerUpdate(<?=$item->id_item;?>);">Salveaza modificarile</button>
																										</form>
																										
																									</div>
																							</div>
																							
																							<!-- tab-ID-oferta -->
																					</div>

																			</div>

																	</div>
																	<!-- TAB -->
                                </div>
																<?php endforeach; ?>

                            </div>

                        </div>

                    </div>
                </div>



            </div>												
												
												
											<?php endif; ?>

						</div>
				</div>
		</div>	
	</div>
</div>

<div class="modal inmodal" id="myModalPlanifcamera" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content animated bounceIn">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<i class="fa fa-calendar modal-icon"></i>
								<h4 class="modal-title" id="mpcmt" style="color:#1ab394;">Modal title</h4>
						</div>
						<div class="modal-body">
								<!--<p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
										printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
										remaining essentially unchanged.</p>-->
												
									
							<form method="POST" id="form_mpc">
								<div class="form-group" id="data_5">
										<label>De la data - data</label>
										<div class="input-daterange input-group" id="datepicker" style="width:100%;">
												<input type="text" class="form-control" name="date_start" value="" required />
												<span class="input-group-addon">pana la</span>
												<input type="text" class="form-control" name="date_end" value="" required />
										</div>
								</div>
								
								<div class="form-group">
								<label>Pret aferent acestui interval(pret pentru o zi de cazare)</label> 					
									<input type="number" placeholder="Pret in ron" name="pret" class="form-control" required>
								</div>
							</form>
							
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-white" data-dismiss="modal">Anuleaza</button>
								<button type="button" class="btn btn-primary" onClick="return planIntervaleAjax();">Mai departe</button>
						</div>
				</div>
		</div>
</div>