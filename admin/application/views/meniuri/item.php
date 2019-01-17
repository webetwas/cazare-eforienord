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
							<a href="javascript:void(0);"><strong style="color:black;">Meniu:</strong></a>
						</li>
						<li role="presentation" class="active">
							<a href="#tab1" data-toggle="tab"><?=(!is_null($item) && !is_null($item->item_name) ? $item->item_name : "Nou");?></a>
						</li>
						<?php if(!is_null($item)):?>
						<li role="presentation">
							<a href="#tab2" data-toggle="tab">Tab2</a>
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
																<label class="col-sm-2 control-label"><span style="border-bottom:2px solid #1c84c6;color:black;"><i class="fa fa-cogs" style="color:#1c84c6"></i> Legaturi&nbsp;</span></label>
																<div class="col-sm-10">
																	<?php if(is_null($links)): echo "Nu s-au gasit legaturi"; ?>
																	<?php elseif(!is_null($links)): ?>
																	<select multiple data-placeholder="Cauta legaturi..." class="chosen-sl-links" style="width:350px;" tabindex="4">
																	
																	<?php foreach($links as $link): ?>
																		<?php
																		$selected = "";
																		if(!is_null($item_links) && array_key_exists($link->id_link, $item_links)) $selected = "selected";
																		?>
																		<option value="<?=$link->id_link?>" <?=$selected?>><?=$link->denumire_ro?></option>
																	<?php endforeach; ?>
																	</select>
																	<?php endif; ?>
																</div>
															</div>
														</div>
														<?php endif; ?>
														
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Nume meniu</label>
																<div class="col-sm-10">
																	<input type="text" placeholder="Numele meniului" class="form-control" name="<?=$form->item->prefix;?>item_name" value="<?=(!is_null($item) && !is_null($item->item_name) ? $item->item_name : "");?>" required>
																</div>
															</div>
														</div>
														
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label" style="color:#1c84c6;">Calea meniului</label>
																<div class="col-sm-10">
																	<input type="text" placeholder="Adresa care este folosita in Link" class="form-control" name="<?=$form->item->prefix;?>fullpath" value="<?=(!is_null($item) && !is_null($item->fullpath) ? $item->fullpath : "");?>" required>
																	<span class="help-block">Ex: folder/folder/fisier "masina/dacia/logan"</span>
																</div>
															</div>
														</div>

														<div class="hr-line-dashed"></div>
														<fieldset>
																<div class="form-group">
																	<div class="col-sm-12">
																		<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>/meniuri'">Anuleaza</button>
																		<button class="btn btn-primary" type="submit" name="<?=$form->item->prefix;?>submit"><?=(isset($uri->item) && $uri->item == "i" ? "Creaza meniu" : "Salveaza modificarile")?></button>
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
							<!--start#tab2-->
							<div id="tab2" class="tab-pane">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
										content II
										</div> <!-- end col-md-12 -->
									</div>
								</div>
							</div><!--end#content-->											
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</div>

</div>