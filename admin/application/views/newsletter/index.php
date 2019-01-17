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
																	<th>Nume Prenume</th>
																	<th>Adresa E-mail</th>
																	
																	<th></th>
																</thead>
																<?php foreach($items as $keyitem => $item): ?>
																<tbody>
																<tr>
																		<td>
																			<strong><?=$item->id_item?></strong>
																		</td>
																		<td>
																			<?=$item->numeprenume?>
																		</td>
																		<td>
																			<?=$item->email?>
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