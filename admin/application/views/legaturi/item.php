<?php
// var_dump($item);
// var_dump($parent);
?>

<div class="wrapper wrapper-content animated fadeIn">

		<div class="row">
			<div class="col-md-12">

				<div class="tabs-container">

					<ul role="tablist" class="nav nav-tabs">
						<li role="presentation">
							<a href="javascript:void(0);"><strong style="color:black;">Legatura:</strong></a>
						</li>
						<li role="presentation" class="active">
							<a href="#tab1" data-toggle="tab"><?=(!is_null($item) && !is_null($item->denumire_ro) ? $item->denumire_ro : "Noua");?></a>
						</li>
						<?php if(!is_null($item)):?>
						<li role="presentation">
							<a href="#pagina_meta" data-toggle="tab">Meta</a>
						</li>
						<?php endif; ?>
					</ul>

						<div class="tab-content">
							<!--start#tab1-->
							<div id="tab1" class="tab-pane active">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" method="POST" name="<?=$form->item->name;?>" action="<?=base_url().$form->item->segments?>">
												
												<?php if(!is_null($parent)): ?>
												<div class="form-group"><label class="col-sm-2 control-label">Legatura parinte</label>
														<div class="col-sm-10"><input type="text" class="form-control" value="<?=$parent->denumire_ro?>" disabled></div>
												</div>
												<div class="hr-line-dashed"></div>
												<?php endif; ?>												
												
												<div class="form-group">
													<label class="col-sm-2 control-label">Nume legatura</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="<?=$form->item->prefix;?>denumire_ro" value="<?=(!is_null($item) && !is_null($item->denumire_ro) ? $item->denumire_ro : "");?>" required>
													</div>
												</div>

												<div class="hr-line-dashed"></div>
												<fieldset>
														<div class="form-group">
															<div class="col-sm-12">
																<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>legaturi'">Anuleaza</button>
																<button class="btn btn-primary" type="submit" name="<?=$form->item->prefix;?>submit"><?=(isset($uri->item) && $uri->item == "i" ? "Creaza legatura" : "Salveaza modificarile")?></button>
															</div>
														</div>
												</fieldset>
											</form>
										</div> <!-- end col-md-12 -->
									</div>
								</div>
							</div><!--end#tab1-->
							
							<?php if(!is_null($item)):?>
							<!--start#pagina_meta-->
							<div id="pagina_meta" class="tab-pane">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<form method="POST" name="<?=$form->meta->name;?>" action="<?=base_url().$form->meta->segments?>">

												<?php
													// Admin
													if($application->user->privilege) {
														echo '
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label>ID HttpURL</label>
																	<input type="text" name="' .$form->meta->prefix. 'idhttp_url" value="' .$item->idhttp_url. '" placeholder="ID HttpURL" class="form-control" readonly>
																</div>
															</div>';
															echo '
															<div class="col-sm-6">
																<div class="form-group">
																	<label><span style="border-bottom:2px solid #1c84c6;color:black;"><i class="fa fa-cogs" style="color:#1c84c6"></i> Unique ID&nbsp;</span></label>
																	<input type="text" name="' .$form->meta->prefix. 'unique_id" value="' .$item->unique_id. '" placeholder="Unique ID" class="form-control" readonly>
																</div>
															</div>
														</div>';
												}
												?>

												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>Titlu Browser</label>
															<input type="text" name="<?=$form->meta->prefix;?>title_browser_ro" value="<?=(!is_null($item->title_browser_ro) ? $item->title_browser_ro : "")?>" placeholder="Titlu Browser" class="form-control">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>Meta description</label>
															<input type="text" name="<?=$form->meta->prefix;?>meta_description" value="<?=(!is_null($item->meta_description) ? $item->meta_description : "");?>" placeholder="Meta description" class="form-control">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label>Keywords</label>
															<input type="text" name="<?=$form->meta->prefix;?>keywords" value="<?=(!is_null($item->keywords) ? $item->keywords : "");?>" placeholder="Keywords" class="form-control">
															<span class="help-block">"cuvant, cuvant cheie, alt cuvant"</span>
														</div>
													</div>
												</div>
												<div class="hr-line-dashed"></div>
												<fieldset>
														<div class="form-group">
																<div class="col-sm-12">
																	<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>legaturi'">Anuleaza</button>
																	<button type="submit" name="<?=$form->meta->prefix;?>submit" class="btn btn-info btn-fill btn-wd" onClick="return showloader();">Salveaza modificarile</button>
																</div>
														</div>
												</fieldset>
											</form>
										</div> <!-- end col-md-12 -->
									</div>
								</div>
							</div><!--end#pagina_meta-->
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
			<div class="col-lg-12">
					<div class="ibox float-e-margins">
							<div class="ibox-title">
									<h5>All form elements <small>With custom checbox and radion elements.</small></h5>
									<div class="ibox-tools">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#">
													<i class="fa fa-wrench"></i>
											</a>
											<ul class="dropdown-menu dropdown-user">
													<li><a href="#">Config option 1</a>
													</li>
													<li><a href="#">Config option 2</a>
													</li>
											</ul>
									</div>
							</div>
							<div class="ibox-content">
									<form method="get" class="form-horizontal">
											<?php if(!is_null($parent)): ?>
											<div class="form-group"><label class="col-sm-2 control-label">Legatura parinte</label>
													<div class="col-sm-10"><input type="text" class="form-control" value="<?=$parent->denumire_ro?>" disabled></div>
											</div>
											<div class="hr-line-dashed"></div>
											<?php endif; ?>
				
											<div class="form-group"><label class="col-sm-2 control-label"><?=(is_null($parent) ? "Legatura noua" : "Sublegatura")?></label>
													<div class="col-sm-10"><input type="text" class="form-control"> <span class="help-block m-b-none"><?=(is_null($parent) ? "Creaza legatura principala" : "Sublegatura noua")?></span>
													</div>
											</div>

											<div class="hr-line-dashed"></div>
											<div class="form-group">
													<div class="col-sm-4 col-sm-offset-2">
															<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>/categorii'">Anuleaza</button>
															<button class="btn btn-primary" type="submit"><?=(isset($uri->item) && $uri->item == "i" ? "Creaza legatura" : "Salveaza modificarile")?></button>
													</div>
											</div>
									</form>
							</div>
					</div>
			</div>
	</div>
</div>