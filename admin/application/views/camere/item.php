<?php
// var_dump($links);
// var_dump($item);
// var_dump($item_links);
// var_dump($videolist);
?>

<div class="wrapper wrapper-content animated fadeIn">

		<div class="row">
			<div class="col-md-12">

				<div class="tabs-container">

					<ul role="tablist" class="nav nav-tabs">
						<li role="presentation">
							<a href="javascript:void(0);"><strong style="color:black;">Camera:</strong></a>
						</li>
						<li role="presentation" class="active">
							<a href="#tab1" data-toggle="tab"><?=(!is_null($item) && !is_null($item->item_name) ? $item->item_name : "Noua");?></a>
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
												<div class="content content-full-width">
													<div class="panel-group">
														<?php if(!is_null($item)):?>
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label"><span style="border-bottom:2px solid #1c84c6;color:black;"><i class="fa fa-star" style="color:#1c84c6"></i> Publica in..&nbsp;</span></label>
																<div class="col-sm-10">
																	<?php if(is_null($links)): echo "Nu s-au gasit legaturi"; ?>
																	<?php elseif(!is_null($links)): ?>
																	<select multiple data-placeholder="Lista destinatii..." class="chosen-sl-links" style="width:350px;" tabindex="4">
																	
																	<?php foreach($links as $link): ?>
																		<?php
																		$selected = "";
																		if(!is_null($item_links) && array_key_exists($link->id_link, $item_links)) $selected = "selected";
																		?>
																		<option value="<?=$link->id_link?>" <?=$selected?>><?=$link->denumire_ro?></option>
																	<?php endforeach; ?>
																	</select>
																	<span class="help-block m-b-none">Pentru a publica aceasta Camera, selecteaza din lista de mai sus destinatia dorita!</span>
																	<?php endif; ?>
																</div>
															</div>
														</div>
														<?php endif; ?>
														
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Nume camera</label>
																<div class="col-sm-10">
																	<input type="text" placeholder="Numele camerei" class="form-control" name="<?=$form->item->prefix;?>item_name" value="<?=(!is_null($item) && !is_null($item->item_name) ? $item->item_name : "");?>" required>
																</div>
															</div>
														</div>
														
														<?php if(!is_null($item)):?>
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Titlu de prezentare</label>
																<div class="col-sm-10">
																	<input type="text" placeholder="Titlul de prezentare al camerei" class="form-control" name="<?=$form->item->prefix;?>titlu_prezentare" value="<?=(!is_null($item) && !is_null($item->titlu_prezentare) ? $item->titlu_prezentare : "");?>" required>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Video de prezentare</label>
																<div class="col-sm-10">

																			<select class="form-control" name="<?=$form->item->prefix;?>id_video">
																				<?php if(is_null($videolist)): echo '<option value="0">Nu exista Video-uri in Galeria Video</option>'; ?>
																				<?php elseif(!is_null($videolist)): ?>
																					<option value="0"><?=($item->id_video ? 'Fara Video' : 'Alege un video')?></option>
																				<?php foreach($videolist as $video): ?>
																					<option value="<?=$video->id_item?>" <?=($item->id_video && $item->id_video == $video->id_item ? 'selected' : '')?>><?=$video->item_key?><?=(!is_null($video->item_name) ? ' - ' .$video->item_name : "")?></option>
																				<?php endforeach; ?>
																				<?php endif; ?>
																			</select>
																			
																</div>
															</div>
														</div>

														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Video de prezentare #2</label>
																<div class="col-sm-10">

																			<select class="form-control" name="<?=$form->item->prefix;?>id_video2">
																				<?php if(is_null($videolist)): echo '<option value="0">Nu exista Video-uri in Galeria Video</option>'; ?>
																				<?php elseif(!is_null($videolist)): ?>
																					<option value="0"><?=($item->id_video2 ? 'Fara Video' : 'Alege un video')?></option>
																				<?php foreach($videolist as $video): ?>
																					<option value="<?=$video->id_item?>" <?=($item->id_video2 && $item->id_video2 == $video->id_item ? 'selected' : '')?>><?=$video->item_key?><?=(!is_null($video->item_name) ? ' - ' .$video->item_name : "")?></option>
																				<?php endforeach; ?>
																				<?php endif; ?>
																			</select>
																			
																</div>
															</div>
														</div>														
																										
														
														<?php endif; ?>
														
														<?php if(!is_null($item)):?>
														<div class="row">
															<div class="form-group">
																<div class="col-sm-2">
																	<!-- <input type="file" name="poza" size="50" class="form-control"> -->
																	<!-- Button trigger modal -->
																	<div class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																		<div class="img-thumbnail-btn">
																			<button type="button" class="btn btn-primary btn-fill btn-upfile" data-toggle="modal" data-target="#inpfileModal" onClick="filesetvars('poza', 'poza')">
																				Incarca imagine <br /><br/><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i>
																			</button>
																		</div>
																	</div>
																</div>
																<div class="col-sm-10">
																	<div id="p_imgpoza">
																		<?php
																			if(isset($item->i) && $item->i) {
																				foreach($item->i as $img) {
																					echo '
																						<div id="imgpoza-' .$img->id. '" class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																							<div class="img-thumbnail" style="padding:2px;">
																								<img class="img-responsive" src="' .$imgpathitem.$img->img. '">
																								<div class="thumbfooter">
																									<a href="javascript:void(0)" onClick="return ajxdelimg(' .$img->id. ', \'poza\');return false"><code-remove>Elimina</code-remove></a>
																								</div>
																							</div>
																						</div>
																					';
																				}
																			}
																		?>
																	</div>
																</div>
															</div>
														</div>												
														<?php endif; ?>
														
														<?php if(!is_null($item)):?>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																		<label><h3>Continut de prezentare</h3></label>
																			<textarea name="<?=$form->item->prefix;?>i_content_ro" id="ncontentro" rows="4"><?=(!is_null($item) && !is_null($item->i_content_ro) ? $item->i_content_ro : "");?></textarea>
																</div>
															</div>
														</div>
														<?php endif; ?>

														<div class="hr-line-dashed"></div>
														<fieldset>
																<div class="form-group">
																	<div class="col-sm-12">
																		<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>camere'">Anuleaza</button>
																		<button class="btn btn-primary" type="submit" name="<?=$form->item->prefix;?>submit"><?=(isset($uri->item) && $uri->item == "i" ? "Mai departe" : "Salveaza modificarile")?></button>
																	</div>
																</div>
														</fieldset>
													</div>
												</div>
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
															<div class="col-sm-12">
																<div class="form-group">
																	<label>ID HttpURL</label>
																	<input type="text" name="' .$form->meta->prefix. 'http_id" value="' .$item->http_id. '" placeholder="httpID" class="form-control" readonly>
																</div>
															</div>
														</div>';
												}
												?>

												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>Titlu Browser</label>
															<input type="text" name="<?=$form->meta->prefix;?>http_title_browser" value="<?=(!is_null($item->http_title_browser) ? $item->http_title_browser : "")?>" placeholder="Titlu Browser" class="form-control">
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>Meta description</label>
															<input type="text" name="<?=$form->meta->prefix;?>http_meta_description" value="<?=(!is_null($item->http_meta_description) ? $item->http_meta_description : "");?>" placeholder="Meta description" class="form-control">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label>Keywords</label>
															<input type="text" name="<?=$form->meta->prefix;?>http_keywords" value="<?=(!is_null($item->http_keywords) ? $item->http_keywords : "");?>" placeholder="Keywords" class="form-control">
															<span class="help-block">"cuvant, cuvant cheie, alt cuvant"</span>
														</div>
													</div>
												</div>
												<div class="hr-line-dashed"></div>
												<fieldset>
														<div class="form-group">
																<div class="col-sm-12">
																	<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>servicii'">Anuleaza</button>
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
        <!-- Modal upload image -->
        <form method="POST" id="fmodalupfile" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal fade" id="inpfileModal" tabindex="-1" role="dialog" aria-labelledby="inpfileModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="inpfileModalLabel">Incarca imagine</h4>
                </div>
                <div class="modal-body">
                  <input type="file" name="inpfile" size="50" class="form-control" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Renunta</button>
                  <button type="button" class="btn btn-primary btn-fill" onClick="return upfile(<?=$item->id_item?>);return false;">Incarca imaginea</button>
                </div>
              </div>
            </div>
          </div>
        </form>