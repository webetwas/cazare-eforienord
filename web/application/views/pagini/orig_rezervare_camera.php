<?php
// var_dump($camera);die();
// var_dump($rez);
// var_dump($error);
?>
        <section id="content" >
						<?=(!is_null($error) ? '<h3 style="color:red;">' .$error. '</h3>' : "")?>
            <h1>Finalizeaza Rezervarea: <strong><?=(!is_null($camera->titlu_prezentare) ? $camera->titlu_prezentare : $camera->item_name )?></strong></h1>
            <hr>
            <div class="checkout-info row" >
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">Camera:</span>
                    <span class="checkout-value"><a href=""><?=(!is_null($camera->titlu_prezentare) ? $camera->titlu_prezentare : $camera->item_name )?></a></span>
                </div>
                <!-- /col-3 -->
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">CHECK IN:</span>
                    <span class="checkout-value"><?=$rez->d_start?></span>
                </div>
                <!-- /col-3 -->
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <span class="checkout-title">CHECK OUT:</span>
                    <span class="checkout-value"><?=$rez->d_end?></span>
                </div>
                <!-- /col-3 -->
            </div>
            <!-- /checkout-info row -->
            <hr>
            <br>
            <div class="row">
                <p></p>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="price pull-right">
                        <span class="price-title">Total Plata:</span>
                        <span class="cost"><?=$rez->total?> RON <span style="color:black;">/ <?=$rez->timp_efectiv?><?=($rez->timp_efectiv == 1 ? 'zi' : 'zile')?></span></span>
												<hr>
                    </div>
                    
                    <div class="col-sm-12">
										
											<form action="<?=base_url()?>rezervari/rezerva_camera/<?=$camera->http_id?>" method="POST" id="submitrezvr">
													<div class="row">
															<div class="col-sm-12 col-md-12 col-lg-12">
																	<div class="row">
																			<div class="col-sm-8 col-md-8 col-lg-8">
																					<input class="form-control input-lg" type="text" name="numeprenume" placeholder="Introdu nume prenume" required>
																			</div>
																			<!-- /col-md-8 -->
																			<div class="col-sm-4 col-md-4 col-lg-4">
																					<span class="form-label">Nume Prenume</span>
																			</div>
																			<!-- /col-md-4 -->
																	</div>
																	<!-- /row -->
															</div>
															<!-- /col-12 -->
													</div>
													<!-- /row -->
													<br>
													<div class="row">
															<div class="col-sm-12 col-md-12 col-lg-12">
																	<div class="row">
																			<div class="col-sm-8 col-md-8 col-lg-8">
																					<input class="form-control input-lg" type="text" name="adresa" placeholder="Adresa" required>
																			</div>
																			<!-- /col-md-8 -->
																			<div class="col-sm-4 col-md-4 col-lg-4">
																					<span class="form-label">Adresa</span>
																			</div>
																			<!-- /col-md-4 -->
																	</div>
																	<!-- /row -->
															</div>
															<!-- /col-12 -->
													</div>
													<!-- /row -->
													<br>
													<div class="row">
															<div class="col-sm-12 col-md-12 col-lg-12">
																	<div class="row">
																			<div class="col-sm-8 col-md-8 col-lg-8">
																					<input class="form-control input-lg" type="text" name="telefon" placeholder="Introdu telefon" required>
																			</div>
																			<!-- /col-md-8 -->
																			<div class="col-sm-4 col-md-4 col-lg-4">
																					<span class="form-label">Telefon</span>
																			</div>
																			<!-- /col-md-4 -->
																	</div>
																	<!-- /row -->
															</div>
															<!-- /col-12 -->
													</div>
													<!-- /row -->
													<br>
													<div class="row">
															<div class="col-sm-12 col-md-12 col-lg-12">
																	<div class="row">
																			<div class="col-sm-8 col-md-8 col-lg-8">
																					<input class="form-control input-lg" type="email" name="email" placeholder="Introdu Email">
																			</div>
																			<!-- /col-md-8 -->
																			<div class="col-sm-4 col-md-4 col-lg-4">
																					<span class="form-label">Email</span>
																			</div>
																			<!-- /col-md-4 -->
																	</div>
																	<!-- /row -->
															</div>
															<!-- /col-12 -->
													</div>
													<!-- /row -->
													
													<div class="row" style="margin-top:15px;">
															<div class="col-sm-12 col-md-12 col-lg-12">
																	<div class="row">
																			<div class="col-sm-8 col-md-8 col-lg-8">
																				<select class="selectpicker" name="adulti">
																						<option class="form-control input-lg" disabled selected>Adulti</option>
																						<option>0</option>
																						<option>1</option>
																						<option>2</option>
																						<option>3</option>
																						<option>4</option>
																				</select>
																			</div>
																			<!-- /col-md-8 -->
																			<div class="col-sm-4 col-md-4 col-lg-4">
																					<span class="form-label">Adulti</span>
																			</div>
																			<!-- /col-md-4 -->
																	</div>
																	<!-- /row -->
															</div>
															<!-- /col-12 -->
													</div>
													<!-- /row -->
													
													<div class="row" style="margin-top:15px;">
															<div class="col-sm-12 col-md-12 col-lg-12">
																	<div class="row">
																			<div class="col-sm-8 col-md-8 col-lg-8">
																				<select class="selectpicker" name="copii">
																						<option class="form-control input-lg" disabled selected>Copii</option>
																						<option>0</option>
																						<option>1</option>
																						<option>2</option>
																						<option>3</option>
																						<option>4</option>
																				</select>
																			</div>
																			<!-- /col-md-8 -->
																			<div class="col-sm-4 col-md-4 col-lg-4">
																					<span class="form-label">Copii</span>
																			</div>
																			<!-- /col-md-4 -->
																	</div>
																	<!-- /row -->
															</div>
															<!-- /col-12 -->
													</div>
													<!-- /row -->
													
												<fieldset style="margin-top:15px;">
														<legend>Verificare: <?=(!is_null($error) ? '<span style="color:red;font-weight:bold">' .$error. '</span>' : "")?></legend>
														<div class="form-group required">
																<label for="input-password" class="col-sm-2 control-label">Cod verificare</label>
																<div class="col-sm-6">
																		<input type="text" name="captcha" value="" placeholder="introduceti codul de mai sus" id="captcha" class="form-control" required>
																</div>
														</div>
												</fieldset>
													
												<input type="hidden" name="rezpdata" value="<?=base64_encode(json_encode($rez))?>" />
												
												<div class="row" style="margin-top:20px;margin-bottom:20px;">
														<button type="submit" name="rezpfin" class="btn btn-primary pull-right">Finalizeaza Rezervarea</button>
												</div>
											</form>
											
											
                    </div>
                </div>
                <!-- /price -->
            </div>
            <!-- /col7 -->
        </section>
        <!-- content -->