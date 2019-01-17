<?php
// var_dump($links);
// var_dump($item);
// var_dump($item_links);
?>

<div class="wrapper wrapper-content animated fadeIn">

		<div class="row">
			<div class="col-md-12">

				<div class="tabs-container">

					<ul role="tablist" class="nav nav-tabs">
						<li role="presentation">
							<a href="javascript:void(0);"><strong style="color:black;">Imagine:</strong></a>
						</li>
						<li role="presentation" class="active">
							<a href="#tab1" data-toggle="tab"><?=(!is_null($item) && !is_null($item->item_key) ? $item->item_key : "Noua");?></a>
						</li>
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
																<label class="col-sm-2 control-label"><span style="border-bottom:2px solid #1c84c6;color:black;"><i class="fa fa-star" style="color:#1c84c6"></i> Publica imaginea&nbsp;</span></label>
																<div class="col-sm-10">
																	<?php if(is_null($links)): echo "Nu s-au gasit legaturi"; ?>
																	<?php elseif(!is_null($links)): ?>
																	<select multiple data-placeholder="Aceasta imagine nu este disponibila publicului" class="chosen-sl-links" style="width:350px;" tabindex="4">
																	
																	<?php foreach($links as $link): ?>
																		<?php
																		$selected = "";
																		if(!is_null($item_links) && array_key_exists($link->id_link, $item_links)) $selected = "selected";
																		?>
																		<option value="<?=$link->id_link?>" <?=$selected?>><?=$link->denumire_ro?></option>
																	<?php endforeach; ?>
																	</select>
																	<span class="help-block m-b-none">Pentru a publica aceasta Imagine, selecteaza din lista de mai sus destinatia dorita!</span>
																	<?php endif; ?>
																</div>
															</div>
														</div>
														<?php endif; ?>
														
														<?php if(is_null($item)):?>
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Se creaza imagine</label>
																<div class="col-sm-10">
																	<input type="text" placeholder="Creare imagine" class="form-control" name="<?=$form->item->prefix;?>item_key" value="<?=(!is_null($last_id) ? 'NR_CRT_' .$last_id : "");?>" readonly>
																</div>
															</div>
														</div>	
														<?php endif; ?>
														
														<?php if(!is_null($item)):?>
														
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Nume imagine</label>
																<div class="col-sm-10">
																	<input type="text" placeholder="Poate fi o descriere scurta a imaginii(nu este obligatoriu)" class="form-control" name="<?=$form->item->prefix;?>item_name" value="<?=(!is_null($item) && !is_null($item->item_name) ? $item->item_name : "");?>">
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