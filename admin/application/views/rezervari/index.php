<?php
// var_dump($items);
?>

<div class="wrapper wrapper-content">
	<div class="middle-box animated fadeInRightBig" style="margin-top:0;padding-top:0;max-width:950px;">
		<div class="row">
				<div class="col-lg-12">
						<div class="wrapper wrapper-content animated fadeInUp">

								<div class="ibox">
										<div class="ibox-content" style="padding:0;">
										<?php if(is_null($items)): echo "Nu s-au gasit Iteme."; ?>
											<?php elseif(!is_null($items)): ?>
												<div class="project-list">

														<table class="table table-hover">
																
																<thead>
																	<th>Nr. crt.</th>
																	<th>Status cerere</th>
																	<th></th>
																	<th></th>
																	<th>Nume Prenume</th>
																	<th>Nr. telefon</th>
																	<th>Data cerere</th>
																	
																	<th></th>
																</thead>
																<?php foreach($items as $keyitem => $item): ?>
																<tbody>
																<tr>
																		<td>
																			<strong><?=$item->id_rezervare?></strong>
																		</td>
																		<td>
																			<strong>
																			<?php
																				switch($item->status)
																				{
																					case "Noua": echo '<span style="color:orange;">' .$item->status. ''; break;
																					case "In desfasurare": echo '<span style="color:green;">' .$item->status. ''; break;
																					case "Finalizata": echo '<span style="color:red;">' .$item->status. ''; break;
																				}
																			?>
																			</strong>
																		</td>
																		<td>
																			<a href="<?=base_url().$controller_fake?>/item/u/id/<?=$item->id_rezervare?>" class="btn btn-info"><i class="fa fa fa-search-plus"></i> Vezi rezervare </a>
																		</td>
																		<td>
																			<a href="<?php echo SITE_URL?>afiseazafisiere/confirmare_rezervare/<?=$item->id_rezervare?>/<?=$item->id_rezervare?>" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Vizualizare PDF </a>
																		</td>																
																		<td class="project-title" style="text-decoration:underline;">
																				<a href="<?=base_url().$controller_fake?>/item/u/id/<?=$item->id_rezervare?>">&nbsp;<?=$item->numeprenume;?>&nbsp;</a>
																				<!--<br/>-->
																				<!--<small>Created 14.08.2014</small>-->
																		</td>
																		<td class="project-title">
																				<?=$item->telefon?>
																				<!--<br/>-->
																				<!--<small>Created 14.08.2014</small>-->
																		</td>																		
																		<td class="project-title">
																				<?=date_format(date_create($item->created_at), 'd.m.Y');?>
																				<!--<br/>-->
																				<!--<small>Created 14.08.2014</small>-->
																		</td>																	
																		
																		<td class="project-actions">
																			<a href="<?=base_url().$controller_fake?>/item/d/id/<?=$item->id_rezervare?>" class="btn btn-danger btn-sm ahrefaskconfirm"><i class="fa fa-trash"></i> </a>
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