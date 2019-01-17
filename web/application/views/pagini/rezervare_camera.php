<?php

// var_dump($camera);die();

// var_dump($rez);

// var_dump($error);

?>

        <section id="content" >

						<?=(!is_null($error) ? '<h3 style="color:red;">' .$error. '</h3>' : "")?>
						
						<h1><strong><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></strong></h1>
            <hr>
						<form action="<?=base_url()?>rezervari" method="POST" id="submitrezvr">
						
            <div class="checkout-info row" >

                <!-- /col-3 -->

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

									<input type="text" name="d_start" class="datepicker" value="<?=(!is_null($rez->d_start) ? $rez->d_start : 'CHECK IN')?>" data-date-format="dd/mm/yy" required>

                </div>

                <!-- /col-3 -->

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

									<input type="text" name="d_end" class="datepicker" value="<?=(!is_null($rez->d_end) ? $rez->d_end : 'CHECK OUT')?>" data-date-format="dd/mm/yy" required>

                </div>

                <!-- /col-3 -->

            </div>

            <!-- /checkout-info row -->

            <hr>

            <div class="row">

                <p></p>

            </div>

            <div class="row">



                <div class="col-sm-12">

                    

                    <div class="col-sm-12">

						

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

															<select class="selectpicker" name="nrcamere">
																<option class="form-control input-lg" disabled selected>Nr. Camere</option>
																<option>1</option>
																<option>2</option>
																<option>3</option>
																<option>4</option>
																<option>5</option>
																<option>6</option>
															</select>

														</div>

														<!-- /col-md-8 -->

														<div class="col-sm-4 col-md-4 col-lg-4">

																<span class="form-label">Nr. camere</span>

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

									<legend><?=(!is_null($error) ? '<span style="color:red;font-weight:bold">' .$error. '</span>' : "")?></legend>

									<div class="form-group required">

											<div class="col-sm-6">

												<input type="text" name="captcha" value="" placeholder="introduceti codul de mai sus" id="captcha" class="form-control" required>

											</div>

									</div>

							</fieldset>

								

							<input type="hidden" name="rezpdata" value="<?=base64_encode(json_encode($rez))?>" />

							

							<div class="row" style="margin-top:20px;margin-bottom:20px;">

								<button type="submit" name="rezpfin" class="btn btn-primary">Finalizeaza Rezervarea</button>

							</div>

						</form>
						<hr>
						<p><?=$page->p->content_ro?></p>

											

											

                    </div>

                </div>

                <!-- /price -->

            </div>

            <!-- /col7 -->

        </section>

        <!-- content -->