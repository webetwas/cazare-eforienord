<?php
// var_dump($links);
// var_dump($item);
// var_dump($item_links);
// var_dump($camera);
?>

<div class="wrapper wrapper-content animated fadeIn">

		<div class="row">
			<div class="col-md-12">

				<div class="tabs-container">

					<ul role="tablist" class="nav nav-tabs">
						<li role="presentation">
							<a href="javascript:void(0);"><strong style="color:black;">Rezervare - Client:</strong></a>
						</li>
						<li role="presentation" class="active">
							<a href="#tab1" data-toggle="tab"><?=(!is_null($item) && !is_null($item->numeprenume) ? $item->numeprenume : "");?></a>
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
																									

														<div class="row m-b-lg m-t-lg">
																<div class="col-md-4">

																		<div class="profile-image">
																		</div>
																		<div class="profile-info">
																				<div class="">
																						<div>
																								<h4>Rezervare facuta de catre</h4>
																								<h2 class="no-margins" style="font-weight:bold;color:#1c84c6;">
																										<?=$item->numeprenume?>
																								</h2>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="col-md-4">
																		<table class="table m-b-xs">
																				<tbody>
																				<tr>
																						<td colspan="2" style="text-align:center;border-top:none;">
																								<strong>Date de contact</strong>
																						</td>
																				</tr>
																				<tr>
																						<td>
																								<strong>Nr. telefon</strong>
																						</td>
																						<td>
																								<?=$item->telefon?>
																						</td>

																				</tr>
																				<tr>
																						<td>
																								<strong>Adresa E-mail</strong>
																						</td>
																						<td>
																								<?=$item->email?>
																						</td>
																				</tr>
																				<tr>
																						<td>
																								<strong>In data:</strong>
																						</td>
																						<td>
																								<?=date_format(date_create($item->created_at), 'd.m.Y');?>
																						</td>
																				</tr>
																				</tbody>
																		</table>
																</div>
														</div>														
														
														<div class="hr-line-dashed"></div>
														
														
														<div class="row m-b-lg m-t-lg">
																<div class="col-md-4">

																		<div class="profile-image">
																		</div>
																		<div class="profile-info">
																				<div class="">
																						<div>
																								<h4>Camera rezervata</h4>
																								<h3 class="no-margins" style="font-weight:bold;color:#1c84c6;">
																										<?=(!is_null($camera->titlu_prezentare) ? $camera->titlu_prezentare : $camera->item_name)?>
																								</h3>
																						</div>
																				</div>
																		</div>
																</div>
																<div class="col-md-4">
																		<table class="table m-b-xs">
																				<tbody>
																				<tr>
																						<td colspan="2" style="text-align:center;border-top:none;">
																								<strong>Informatii despre rezervare</strong>
																						</td>
																				</tr>
																				<tr>
																						<td>
																								<strong>Perioada sedere</strong>
																						</td>
																						<td>
																							<?=date_format(date_create($item->d_start), 'd.m.Y');?> - <?=date_format(date_create($item->d_end), 'd.m.Y');?>
																						</td>

																				</tr>
																				<tr>
																						<td>
																								<strong>Timp efectiv</strong>
																						</td>
																						<td>
																								<?=($item->timp_efectiv. ' nopti')?>
																								<?php
																									$timp_efectiv = $item->timp_efectiv;
																									$timp_efectiv += 1;
																									echo $timp_efectiv." zile";
																								?>
																						</td>
																				</tr>
																				<tr>
																						<td>
																								<strong>Participanti</strong>
																						</td>
																						<td>
																								<?=$item->adulti?> adulti / <?=$item->copii?> copii
																						</td>
																				</tr>																				
																				
																				<tr style="font-size:18px;">
																						<td>
																								<strong>Total de plata</strong>
																						</td>
																						<td>
																								<strong style="color:#1ab394;"><?=$item->total?> RON
																						</td>
																				</tr>
																				</tbody>
																		</table>
																</div>
														</div>														
														<div class="row m-b-lg m-t-lg">
														<div class="col-md-4">																
																<div class="profile-info">
																	<a href="<?php echo SITE_URL?>afiseazafisiere/confirmare_rezervare/<?=$item->id_rezervare?>/<?=$item->id_rezervare?>" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Vizualizare PDF </a>
																</div>
															</div>
														</div>
													</div>
													
													<div class="hr-line-dashed"></div>
													
														<div class="row">
															<div class="form-group">
																<label class="col-sm-2 control-label">Status cerere</label>
																<div class="col-sm-10">
																
																	<select class="form-control" name="<?=$form->item->prefix;?>status">
																		<option value="Noua" <?=($item->status == "Noua" ? 'selected' : '')?>>Noua</option>
																		<option value="In desfasurare" <?=($item->status == "In desfasurare" ? 'selected' : '')?>>In desfasurare</option>
																		<option value="Finalizata" <?=($item->status == "Finalizata" ? 'selected' : '')?>>Finalizata</option>
																	</select>
																	
																</div>
															</div>
														</div>														
													
													<fieldset>
															<div class="form-group">
																<div class="col-sm-12">
																	<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>/rezervari'">Anuleaza</button>
																	<button class="btn btn-primary" type="submit" name="<?=$form->item->prefix;?>submit"><?=(isset($uri->item) && $uri->item == "i" ? "" : "Salveaza modificarile")?></button>
																</div>
															</div>
													</fieldset>
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