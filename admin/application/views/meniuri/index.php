<?php
// var_dump($items);
?>

<div class="wrapper wrapper-content">
	<div class="middle-box text-center animated fadeInRightBig" style="margin-top:0;padding-top:0;max-width:950px;">
		<div class="row">
				<div class="col-lg-12">
						<div class="wrapper wrapper-content animated fadeInUp">

								<div class="ibox">
										<div class="ibox-content" style="padding:0;">
										<?php if(is_null($items)): echo "Nu s-au gasit Iteme."; ?>
											<?php elseif(!is_null($items)): ?>
												<div class="project-list">

														<table class="table table-hover">
																<tbody>
																<thead>
																	<th></th>
																	<th><i class="fa fa-star" style="color:red;"></i> Principal</th>
																	<th>Afisare</th>
																	<th></th>
																</thead>
																<?php foreach($items as $keyitem => $item): ?>
																<tr>
																		<td class="project-title" style="text-decoration:underline;">
																				<a href="<?=base_url().$controller_fake?>/item/u/id/<?=$item->id_item?>">&nbsp;<?=$item->item_name;?>&nbsp;</a>
																				<!--<br/>-->
																				<!--<small>Created 14.08.2014</small>-->
																		</td>
																		<td>
																			<div class="switch">
																				<div class="onoffswitch">
																						<input type="checkbox" class="onoffswitch-checkbox abmenu" id="a_<?=$item->id_item?>" <?=$item->item_parent_fake ? "checked" : ""?>>
																						<label class="onoffswitch-label" for="a_<?=$item->id_item?>">
																								<span class="onoffswitch-inner"></span>
																								<span class="onoffswitch-switch"></span>
																						</label>
																				</div>
																			</div>
																		</td>
																		<td>
																			<div class="switch">
																				<div class="onoffswitch">
																						<input type="checkbox" class="onoffswitch-checkbox abmenu" id="b_<?=$item->id_item?>" <?=$item->item_isactive ? "checked" : ""?>>
																						<label class="onoffswitch-label" for="b_<?=$item->id_item?>">
																								<span class="onoffswitch-inner"></span>
																								<span class="onoffswitch-switch"></span>
																						</label>
																				</div>
																			</div>																		
																		</td>
																		<td class="project-actions">
																			<a href="<?=base_url().$controller_fake?>/item/u/id/<?=$item->id_item?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Editeaza </a>
																			<a href="<?=base_url().$controller_fake?>/item/d/id/<?=$item->id_item?>" class="btn btn-danger btn-sm ahrefaskconfirm"><i class="fa fa-trash"></i> Sterge </a>
																		</td>
																</tr>
																<?php endforeach; ?>
																</tbody>
														</table>
												</div>
											<?php endif; ?>
										</div>
								</div>
						</div>
				</div>
		</div>	
	</div>
</div>