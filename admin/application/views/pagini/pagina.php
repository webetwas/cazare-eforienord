<?php
// var_dump($page);die();
// var_dump($controller_ajax);die();

// var_dump($page->b);die();
?>

        <div class="wrapper wrapper-content animated fadeIn">

            <div class="row">
              <div class="col-md-12">

                <div class="tabs-container">

                  <ul role="tablist" class="nav nav-tabs">
                    <li role="presentation">
                      <a href="javascript:void(0);"><strong style="color:black;">Editare Pagina:</strong></a>
                    </li>
                    <li role="presentation" class="active">
                      <a href="#pagina" data-toggle="tab"><?=$page->p->title;?> </a>
                    </li>
                    <li role="presentation">
                      <a href="#pagina_meta" data-toggle="tab">Meta </a>
                    </li>
										<?php if($application->user->privilege): ?>
                    <li role="presentation">
                      <a href="#structura" data-toggle="tab">Structura</a>
                    </li>
										<?php endif; ?>
                  </ul>

                    <div class="tab-content">
											<!--start#pagina-->
                      <div id="pagina" class="tab-pane active">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-12">
															<form method="POST" name="<?=$form->item->name;?>" action="<?=base_url().$form->item->segments?>">
																<?php
																	// User
																	if(!$application->user->privilege && !is_null($page->p->admin_message)) echo '<div class="alert alert-info" style="border-radius:2px;"><span>' .$page->p->admin_message. '</span></div>';
																?>

																	<?php if( $page->s->banner1 || $page->s->banner2 || $page->s->banner3 || $page->s->banner4): ?>
																	<div class="row rowbanner" style="margin-left:25px;">
																		<div class="content content-full-width">
																				<div class="panel-group" id="banner-main">
																						<?php if(!is_null($page) && !is_null($page->s) && $page->s->banner1): ?>
																						<div class="panel panel-default">
																								<div class="panel-heading" style="position:relative;">
																										<h4 class="panel-title">
																											<a data-target="#collapseOne" href="javascript:void(0);" data-toggle="collapse">
																													<?=($page->p->id_page == "acasa" ? 'Slider #1' : "Banner principal #1")?>
																											</a>
																										</h4>
																								</div>
																								<div id="collapseOne" class="panel-collapse collapse">
																										<div class="panel-body">
																											<div class="row">
																												<div class="col-sm-2" style="padding:20px;">
																													<!-- Button trigger modal -->
																													<button type="button" id="banner1btnup" <?=(isset($page->b->banner1) ? 'style="visibility:hidden;"' : "")?> class="btn btn-primary btn-fill" data-toggle="modal" data-target="#inpfileModal" onClick="filesetvars('banner', 'banner1')">
																														Incarca Banner
																													</button>
																												</div>
																												<div class="col-sm-10">
																													<div id="p_imgbanner1" class="p_imgbanners">
																														<?php
																														if(isset($page->b->banner1)) {
																															echo
																															'
																															<div id="imgbanner1-' .$page->b->banner1->id. '" class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																																<div class="img-thumbnail" style="padding:2px;">
																																	<img class="img-responsive" src="' .SITE_URL.PATH_IMG_BANNERS.$page->b->banner1->img. '">
																																	<div class="thumbfooter">
																																		<a href="javascript:void(0)" onClick="return ajxdelimg(' .$page->b->banner1->id. ', \'banner1\');return false"><code-remove>Elimina Banner</code-remove></a>
																																	</div>
																																</div>
																															</div>
																															';
																														}
																														 ?>
																													</div>
																												</div>
																											</div>
																											<!--banner1formdata-->
																											<div id="banner1formdata" <?=(isset($page->b->banner1) ? 'style="visibility:visible;"' : 'style="visibility:hidden;"')?>>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Titlu</span></label>
																															<input type="text" name="banner1ti" value="<?=(!is_null($page->b) && isset($page->b->banner1) && !is_null($page->b->banner1->titlu) ? $page->b->banner1->titlu : "");?>" placeholder="Titlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Subtitlu</span></label>
																															<input type="text" name="banner1sti" value="<?=(!is_null($page->b) && isset($page->b->banner1) && !is_null($page->b->banner1->subtitlu) ? $page->b->banner1->subtitlu : "");?>" placeholder="Subtitlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Link de legatura</span></label>
																															<input type="text" name="banner1href" value="<?=(!is_null($page->b) && isset($page->b->banner1) && !is_null($page->b->banner1->href) ? $page->b->banner1->href : "");?>" placeholder="Adresa link href" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Text pentru butonul de legatura</span></label>
																															<input type="text" name="banner1thref" value="<?=(!is_null($page->b) && isset($page->b->banner1) && !is_null($page->b->banner1->thref) ? $page->b->banner1->thref : "");?>" placeholder="Text pentru butonul de legatura" class="form-control input-sm">
																														</div>
																													</div>
																												</div>																												
																												
																												<fieldset>
																												<div class="form-group">
																														<div class="col-sm-12">
																															<button type="button" class="btn btn-sm btn-info btn-fill btn-wd" onClick="return bannerfdata('banner1');return false;">Salveaza modificarile</button>
																														</div>
																												</div>
																												</fieldset>
																											</div>
																											<!--banner1formdata-->
																										</div>
																								</div>
																						</div>
																						<?php endif; ?>
																						
																						<?php if(!is_null($page) && !is_null($page->s) && $page->s->banner2): ?>
																						<div class="panel panel-default">
																								<div class="panel-heading" style="position:relative;">
																										<h4 class="panel-title">
																											<a data-target="#collapseTwo" href="javascript:void(0);" data-toggle="collapse">
																													<?=($page->p->id_page == "acasa" ? 'Slider #2' : "Banner secundar #2")?>
																											</a>
																										</h4>
																								</div>
																								<div id="collapseTwo" class="panel-collapse collapse">
																										<div class="panel-body">
																											<div class="row">
																												<div class="col-sm-2" style="padding:20px;">
																													<!-- Button trigger modal -->
																													<button type="button" id="banner2btnup" <?=(isset($page->b->banner2) ? 'style="visibility:hidden;"' : "")?> class="btn btn-primary btn-fill" data-toggle="modal" data-target="#inpfileModal" onClick="filesetvars('banner', 'banner2')">
																														Incarca Banner
																													</button>
																												</div>
																												<div class="col-sm-10">
																													<div id="p_imgbanner2" class="p_imgbanners">
																														<?php
																														if(isset($page->b->banner2)) {
																															echo
																															'
																															<div id="imgbanner2-' .$page->b->banner2->id. '" class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																																<div class="img-thumbnail" style="padding:2px;">
																																	<img class="img-responsive" src="' .SITE_URL.PATH_IMG_BANNERS.$page->b->banner2->img. '">
																																	<div class="thumbfooter">
																																		<a href="javascript:void(0)" onClick="return ajxdelimg(' .$page->b->banner2->id. ', \'banner2\');return false"><code-remove>Elimina Banner</code-remove></a>
																																	</div>
																																</div>
																															</div>
																															';
																														}
																														 ?>
																													</div>
																												</div>
																											</div>
																											<!--banner2formdata-->
																											<div id="banner2formdata" <?=(isset($page->b->banner2) ? 'style="visibility:visible;"' : 'style="visibility:hidden;"')?>>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Titlu</span></label>
																															<input type="text" name="banner2ti" value="<?=(!is_null($page->b) && isset($page->b->banner2) && !is_null($page->b->banner2->titlu) ? $page->b->banner2->titlu : "");?>" placeholder="Titlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Subtitlu</span></label>
																															<input type="text" name="banner2sti" value="<?=(!is_null($page->b) && isset($page->b->banner2) && !is_null($page->b->banner2->subtitlu) ? $page->b->banner2->subtitlu : "");?>" placeholder="Subtitlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Link de legatura</span></label>
																															<input type="text" name="banner2href" value="<?=(!is_null($page->b) && isset($page->b->banner2) && !is_null($page->b->banner2->href) ? $page->b->banner2->href : "");?>" placeholder="Adresa link href" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Text pentru butonul de legatura</span></label>
																															<input type="text" name="banner2thref" value="<?=(!is_null($page->b) && isset($page->b->banner2) && !is_null($page->b->banner2->thref) ? $page->b->banner2->thref : "");?>" placeholder="Text pentru butonul de legatura" class="form-control input-sm">
																														</div>
																													</div>
																												</div>																												
																												
																												<fieldset>
																												<div class="form-group">
																														<div class="col-sm-12">
																															<button type="button" class="btn btn-sm btn-info btn-fill btn-wd" onClick="return bannerfdata('banner2');return false;">Salveaza modificarile</button>
																														</div>
																												</div>
																												</fieldset>
																											</div>
																											<!--banner2formdata-->
																										</div>
																								</div>
																						</div>
																						<?php endif; ?>
																						
																						<?php if(!is_null($page) && !is_null($page->s) && $page->s->banner3): ?>
																						<div class="panel panel-default">
																								<div class="panel-heading" style="position:relative;">
																										<h4 class="panel-title">
																											<a data-target="#collapseThree" href="javascript:void(0);" data-toggle="collapse">
																													<?=($page->p->id_page == "acasa" ? 'Slider #3' : "Banner secundar #3")?>
																											</a>
																										</h4>
																								</div>
																								<div id="collapseThree" class="panel-collapse collapse">
																										<div class="panel-body">
																											<div class="row">
																												<div class="col-sm-2" style="padding:20px;">
																													<!-- Button trigger modal -->
																													<button type="button" id="banner3btnup" <?=(isset($page->b->banner3) ? 'style="visibility:hidden;"' : "")?> class="btn btn-primary btn-fill" data-toggle="modal" data-target="#inpfileModal" onClick="filesetvars('banner', 'banner3')">
																														Incarca Banner
																													</button>
																												</div>
																												<div class="col-sm-10">
																													<div id="p_imgbanner3" class="p_imgbanners">
																														<?php
																														if(isset($page->b->banner3)) {
																															echo
																															'
																															<div id="imgbanner3-' .$page->b->banner3->id. '" class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																																<div class="img-thumbnail" style="padding:2px;">
																																	<img class="img-responsive" src="' .SITE_URL.PATH_IMG_BANNERS.$page->b->banner3->img. '">
																																	<div class="thumbfooter">
																																		<a href="javascript:void(0)" onClick="return ajxdelimg(' .$page->b->banner3->id. ', \'banner3\');return false"><code-remove>Elimina Banner</code-remove></a>
																																	</div>
																																</div>
																															</div>
																															';
																														}
																														 ?>
																													</div>
																												</div>
																											</div>
																											<!--banner3formdata-->
																											<div id="banner3formdata" <?=(isset($page->b->banner3) ? 'style="visibility:visible;"' : 'style="visibility:hidden;"')?>>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Titlu</span></label>
																															<input type="text" name="banner3ti" value="<?=(!is_null($page->b) && isset($page->b->banner3) && !is_null($page->b->banner3->titlu) ? $page->b->banner3->titlu : "");?>" placeholder="Titlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Subtitlu</span></label>
																															<input type="text" name="banner3sti" value="<?=(!is_null($page->b) && isset($page->b->banner3) && !is_null($page->b->banner3->subtitlu) ? $page->b->banner3->subtitlu : "");?>" placeholder="Subtitlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Link de legatura</span></label>
																															<input type="text" name="banner3href" value="<?=(!is_null($page->b) && isset($page->b->banner3) && !is_null($page->b->banner3->href) ? $page->b->banner3->href : "");?>" placeholder="Adresa link href" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Text pentru butonul de legatura</span></label>
																															<input type="text" name="banner3thref" value="<?=(!is_null($page->b) && isset($page->b->banner3) && !is_null($page->b->banner3->thref) ? $page->b->banner3->thref : "");?>" placeholder="Text pentru butonul de legatura" class="form-control input-sm">
																														</div>
																													</div>
																												</div>																													
																												
																												<fieldset>
																												<div class="form-group">
																														<div class="col-sm-12">
																															<button type="button" class="btn btn-sm btn-info btn-fill btn-wd" onClick="return bannerfdata('banner3');return false;">Salveaza modificarile</button>
																														</div>
																												</div>
																												</fieldset>
																											</div>
																											<!--banner3formdata-->
																										</div>
																								</div>
																						</div>
																						<?php endif; ?>

																						<?php if(!is_null($page) && !is_null($page->s) && $page->s->banner4): ?>
																						<div class="panel panel-default">
																								<div class="panel-heading" style="position:relative;">
																										<h4 class="panel-title">
																											<a data-target="#collapseFour" href="javascript:void(0);" data-toggle="collapse">
																													<?=($page->p->id_page == "acasa" ? 'Slider #4' : "Banner secundar #4")?>
																											</a>
																										</h4>
																								</div>
																								<div id="collapseFour" class="panel-collapse collapse">
																										<div class="panel-body">
																											<div class="row">
																												<div class="col-sm-2" style="padding:20px;">
																													<!-- Button trigger modal -->
																													<button type="button" id="banner4btnup" <?=(isset($page->b->banner4) ? 'style="visibility:hidden;"' : "")?> class="btn btn-primary btn-fill" data-toggle="modal" data-target="#inpfileModal" onClick="filesetvars('banner', 'banner4')">
																														Incarca Banner
																													</button>
																												</div>
																												<div class="col-sm-10">
																													<div id="p_imgbanner4" class="p_imgbanners">
																														<?php
																														if(isset($page->b->banner4)) {
																															echo
																															'
																															<div id="imgbanner4-' .$page->b->banner4->id. '" class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																																<div class="img-thumbnail" style="padding:2px;">
																																	<img class="img-responsive" src="' .SITE_URL.PATH_IMG_BANNERS.$page->b->banner4->img. '">
																																	<div class="thumbfooter">
																																		<a href="javascript:void(0)" onClick="return ajxdelimg(' .$page->b->banner4->id. ', \'banner4\');return false"><code-remove>Elimina Banner</code-remove></a>
																																	</div>
																																</div>
																															</div>
																															';
																														}
																														 ?>
																													</div>
																												</div>
																											</div>
																											<!--banner4formdata-->
																											<div id="banner4formdata" <?=(isset($page->b->banner4) ? 'style="visibility:visible;"' : 'style="visibility:hidden;"')?>>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Titlu</span></label>
																															<input type="text" name="banner4ti" value="<?=(!is_null($page->b) && isset($page->b->banner4) && !is_null($page->b->banner4->titlu) ? $page->b->banner4->titlu : "");?>" placeholder="Titlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Subtitlu</span></label>
																															<input type="text" name="banner4sti" value="<?=(!is_null($page->b) && isset($page->b->banner4) && !is_null($page->b->banner4->subtitlu) ? $page->b->banner4->subtitlu : "");?>" placeholder="Subtitlu banner" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Link de legatura</span></label>
																															<input type="text" name="banner4href" value="<?=(!is_null($page->b) && isset($page->b->banner4) && !is_null($page->b->banner4->href) ? $page->b->banner4->href : "");?>" placeholder="Adresa link href" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<div class="row">
																													<div class="col-md-12">
																														<div class="form-group">
																															<label><span style="font-size:12px;">Text pentru butonul de legatura</span></label>
																															<input type="text" name="banner4thref" value="<?=(!is_null($page->b) && isset($page->b->banner4) && !is_null($page->b->banner4->thref) ? $page->b->banner4->thref : "");?>" placeholder="Text pentru butonul de legatura" class="form-control input-sm">
																														</div>
																													</div>
																												</div>
																												
																												<fieldset>
																												<div class="form-group">
																														<div class="col-sm-12">
																															<button type="button" class="btn btn-sm btn-info btn-fill btn-wd" onClick="return bannerfdata('banner4');return false;">Salveaza modificarile</button>
																														</div>
																												</div>
																												</fieldset>
																											</div>
																											<!--banner4formdata-->
																										</div>
																								</div>
																						</div>
																						<?php endif; ?>																								
																				</div><!-- banners -->
																		</div>
																	</div>
																	<hr>
																	<?php endif; ?>

																	<?php if($page->s->image): ?>
																	<div class="row">
																		<div class="form-group">
																			<label>Imagini</label>
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
																		</div>
																		<div class="form-group">
																			<div class="col-sm-10">
																				<div id="p_imgpoza">
																					<?php
																						if(!is_null($page->i)) {
																							foreach($page->i as $img) {
																								echo '
																									<div id="imgpoza-' .$img->id. '" class="col-lg-2 col-md-4 col-xs-6 col-xs-12 thumb-nomg">
																										<div class="img-thumbnail" style="padding:2px;">
																											<img class="img-responsive" src="' .$imgpathpage.$img->img. '">
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
																	<hr>
																	<?php endif; ?>
																	
																	<?php if($page->s->title_content): ?>
																	<div class="row">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label><h3>Titlu continut</h3></label>
																				<input type="text" name="<?=$form->item->prefix;?>title_content_ro" value="<?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "");?>" placeholder="Titlu continut" class="form-control">
																			</div>
																		</div>
																	</div>
																	<?php endif; ?>
																	
																	<?php if($page->s->subtitle_content): ?>
																	<div class="row">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label><h3>Subtitlu continut</h3></label>
																				<input type="text" name="<?=$form->item->prefix;?>subtitle_content_ro" value="<?=(!is_null($page->p->subtitle_content_ro) ? $page->p->subtitle_content_ro : "");?>" placeholder="Titlu continut" class="form-control">
																			</div>
																		</div>
																	</div>
																	<?php endif; ?>
																	
																	<div class="row">
																		<div class="col-md-12">
																			<div class="form-group">
																					<label><h3>Continut pagina</h3></label>
																						<textarea name="<?=$form->item->prefix;?>content_ro" id="ncontentro" rows="4"><?=$page->p->content_ro;?></textarea>
																			</div>
																		</div>
																	</div>
																	<div class="hr-line-dashed"></div>
																	<fieldset>
																			<div class="form-group">
																					<div class="col-sm-12">
																						 <button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>'">Anuleaza</button>
																						 <button type="submit" name="<?=$form->item->prefix;?>submit" class="btn btn-info btn-fill btn-wd" onClick="return showloader();">Salveaza modificarile</button>
																					</div>
																			</div>
																	</fieldset>
															</form>
														</div> <!-- end col-md-12 -->
													</div>
												</div>
                      </div><!--end#pagina-->
											
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
																					<label>Informatii suplimentare despre Pagina</label>
																					<input type="text" name="' .$form->meta->prefix. 'admin_message" value="' .$page->p->admin_message. '" placeholder="" class="form-control">
																				</div>
																			</div>';
																			echo '
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>ID Page</label>
																					<input type="text" name="' .$form->meta->prefix. 'id_page" value="' .$page->p->id_page. '" placeholder="Pagina" class="form-control" disabled>
																				</div>
																			</div>
																		</div>';
																}
																?>													

																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																					<label>Pagina</label>
																					<input type="text" name="<?=$form->meta->prefix;?>title" value="<?=$page->p->title;?>" placeholder="Pagina" class="form-control">
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label>Titlu</label>
																				<input type="text" name="<?=$form->meta->prefix;?>title_ro" value="<?=$page->p->title_ro;?>" placeholder="Titlu" class="form-control">
																			</div>
																		</div>

																		<div class="col-sm-6">
																			<div class="form-group">
																				<label>Titlu Browser</label>
																				<input type="text" name="<?=$form->meta->prefix;?>title_browser_ro" value="<?=$page->p->title_browser_ro;?>" placeholder="Titlu Browser" class="form-control">
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label>Meta description</label>
																				<input type="text" name="<?=$form->meta->prefix;?>meta_description" value="<?=(!is_null($page->p->meta_description) ? $page->p->meta_description : "");?>" placeholder="Meta description" class="form-control">
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label>Keywords</label>
																				<input type="text" name="<?=$form->meta->prefix;?>keywords" value="<?=(!is_null($page->p->keywords) ? $page->p->keywords : "");?>" placeholder="Keywords" class="form-control">
																				<span class="help-block">"cuvant, cuvant cheie, alt cuvant"</span>
																			</div>
																		</div>
																	</div>
																	<div class="hr-line-dashed"></div>
																	<fieldset>
																			<div class="form-group">
																					<div class="col-sm-12">
																						<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>'">Anuleaza</button>
																						<button type="submit" name="<?=$form->meta->prefix;?>submit" class="btn btn-info btn-fill btn-wd" onClick="return showloader();">Salveaza modificarile</button>
																					</div>
																			</div>
																	</fieldset>
															</form>
														</div> <!-- end col-md-12 -->
													</div>
												</div>
                      </div><!--end#pagina_meta-->											
											
											<?php if($application->user->privilege): ?>
											<!--#structura-->
                      <div id="structura" class="tab-pane">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-12">		
															<form method="POST" name="<?=$form->structura->name;?>" action="<?=base_url().$form->structura->segments?>">
															
																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Titlu</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>title_content" <?=(!is_null($page) && !is_null($page->s) && $page->s->title_content ? "checked" : "")?>>Titlu continut
																						</label>
																				</div>
																		</div>
																</fieldset>
																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Subtitlu</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>subtitle_content" <?=(!is_null($page) && !is_null($page->s) && $page->s->subtitle_content ? "checked" : "")?>>Subtitlu continut
																						</label>
																				</div>
																		</div>
																</fieldset>	
																<hr>
																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-fighter-jet" aria-hidden="true"></i> is_active</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>is_active" <?=(!is_null($page) && !is_null($page->s) && $page->s->is_active ? "checked" : "")?>>Pagina activa
																						</label>
																				</div>
																		</div>
																</fieldset>
																
																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-fighter-jet" aria-hidden="true"></i> is_page</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>is_page" <?=(!is_null($page) && !is_null($page->s) && $page->s->is_page ? "checked" : "")?>>IS
																						</label>
																				</div>
																		</div>
																</fieldset>															

																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-fighter-jet" aria-hidden="true"></i> gotcontroller</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>gotcontroller" <?=(!is_null($page) && !is_null($page->s) && $page->s->gotcontroller ? "checked" : "")?>>Controller
																						</label>
																				</div>
																		</div>
																</fieldset>	
															
																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-plane" aria-hidden="true"></i> Meniu</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>menu" <?=(!is_null($page) && !is_null($page->s) && $page->s->menu ? "checked" : "")?>>Afiseaza Meniu
																						</label>
																				</div>
																		</div>
																</fieldset>
																
																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-plane" aria-hidden="true"></i> Slider</label>
																				<div class="col-sm-10">
																						<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>slider" <?=(!is_null($page) && !is_null($page->s) && $page->s->slider ? "checked" : "")?>>Afiseaza Slider
																						</label>
																				</div>
																		</div>
																</fieldset>

																<fieldset>
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-rocket" aria-hidden="true"></i> View</label>
																				<div class="col-sm-10">
																					<div class="row">
																						<div class="col-sm-5">
																							<div class="input-group">
																								<span class="input-group-addon"><strong style="color:#4285f4;">View</strong></span>
																								<input type="text" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->filehtml) ? $page->s->filehtml : "")?>" name="<?=$form->structura->prefix;?>filehtml">
																							</div>
																							<span class="help-block"><code>view/</code>folder/folder/file</span>
																						</div>
																						<div class="col-sm-5">
																							<div class="input-group">
																								<span class="input-group-addon"><strong style="color:#4285f4;">JS</strong></span>
																								<input type="text" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->filejs) ? $page->s->filejs : "")?>" name="<?=$form->structura->prefix;?>filejs">
																							</div>
																							<span class="help-block"><code>view/</code>folder/folder/file</span>
																						</div>
																					</div>
																				</div>
																		</div>
																</fieldset>
														
																
																<fieldset style="margin-top:10px;">
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-rocket" aria-hidden="true"></i> Banner</label>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner1" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner1 ? "checked" : "")?>>#1 Afiseaza
																							</label>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner1_w) ? $page->s->banner1_w : "")?>" name="<?=$form->structura->prefix;?>banner1_w">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner1_h) ? $page->s->banner1_h : "")?>" name="<?=$form->structura->prefix;?>banner1_h">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner1_p" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner1_p ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner2" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner2 ? "checked" : "")?>>#2 Afiseaza
																							</label>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner2_w) ? $page->s->banner2_w : "")?>" name="<?=$form->structura->prefix;?>banner2_w">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner2_h) ? $page->s->banner2_h : "")?>" name="<?=$form->structura->prefix;?>banner2_h">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner2_p" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner2_p ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner3" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner3 ? "checked" : "")?>>#3 Afiseaza
																							</label>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner3_w) ? $page->s->banner3_w : "")?>" name="<?=$form->structura->prefix;?>banner3_w">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner3_h) ? $page->s->banner3_h : "")?>" name="<?=$form->structura->prefix;?>banner3_h">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner3_p" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner3_p ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner4" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner4 ? "checked" : "")?>>#4 Afiseaza
																							</label>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner4_w) ? $page->s->banner4_w : "")?>" name="<?=$form->structura->prefix;?>banner4_w">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon">Height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->banner4_h) ? $page->s->banner4_h : "")?>" name="<?=$form->structura->prefix;?>banner4_h">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>banner4_p" <?=(!is_null($page) && !is_null($page->s) && $page->s->banner4_p ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																		</div>
																</fieldset>
																
																<fieldset style="margin-top:10px;">
																		<div class="form-group">
																				<label class="col-sm-2 control-label"><i class="fa fa-rocket" aria-hidden="true"></i> Imagini</label>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>image" <?=(!is_null($page) && !is_null($page->s) && $page->s->image ? "checked" : "")?>>Afiseaza
																							</label>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon"><code>S</code>.width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->image_sw) ? $page->s->image_sw : "")?>" name="<?=$form->structura->prefix;?>image_sw">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon"><code>S</code>.height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->image_sh) ? $page->s->image_sh : "")?>" name="<?=$form->structura->prefix;?>image_sh">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>image_sp" <?=(!is_null($page) && !is_null($page->s) && $page->s->image_sp ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-3 col-sm-offset-2">
																							<div class="input-group">
																								<span class="input-group-addon"><code>M</code>.width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->image_mw) ? $page->s->image_mw : "")?>" name="<?=$form->structura->prefix;?>image_mw">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon"><code>M</code>.height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->image_mh) ? $page->s->image_mh : "")?>" name="<?=$form->structura->prefix;?>image_mh">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>image_mp" <?=(!is_null($page) && !is_null($page->s) && $page->s->image_mp ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																				<div class="col-sm-12">
																					<div class="row">
																						<div class="col-sm-3 col-sm-offset-2">
																							<div class="input-group">
																								<span class="input-group-addon"><code>L</code>.width</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->image_lw) ? $page->s->image_lw : "")?>" name="<?=$form->structura->prefix;?>image_lw">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="input-group">
																								<span class="input-group-addon"><code>L</code>.height</span>
																								<input type="number" placeholder="" class="form-control" value="<?=(!is_null($page) && !is_null($page->s) && !is_null($page->s->image_lh) ? $page->s->image_lh : "")?>" name="<?=$form->structura->prefix;?>image_lh">
																							</div>
																						</div>
																						<div class="col-sm-2">
																							<label class="checkbox">
																								<input type="checkbox" data-toggle="checkbox" value="1" name="<?=$form->structura->prefix;?>image_lp" <?=(!is_null($page) && !is_null($page->s) && $page->s->image_lp ? "checked" : "")?>>Proportii
																							</label>
																						</div>
																					</div>
																				</div>
																		</div>
																</fieldset>
																<div class="hr-line-dashed"></div>
																<fieldset>
																		<div class="form-group">
																				<div class="col-sm-12">
																					<button class="btn btn-white" type="button" onClick="location.href='<?=base_url()?>'">Anuleaza</button>
																					<button type="submit" name="<?=$form->structura->prefix;?>submit" class="btn btn-info btn-fill btn-wd" onClick="return showloader();">Salveaza modificarile</button>
																				</div>
																		</div>
																</fieldset>
															</form>
														</div> <!-- end col-md-12 -->
													</div>
												</div>
                      </div> <!--/#structura-->
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
                  <button type="button" class="btn btn-primary btn-fill" onClick="return upfile(<?=$page->p->id;?>);return false;">Incarca imaginea</button>
                </div>
              </div>
            </div>
          </div>
        </form>
