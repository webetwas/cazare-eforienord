<?php

// var_dump($company);

?>

	<section id="content">

			<h3 class="col6"><?=(!is_null($page->p->title_content_ro) ? $page->p->title_content_ro : "")?></h3>

			<p><?=(!is_null($page->p->content_ro) ? $page->p->content_ro : "")?></p>

			<hr>

			

			<div class="row" style="margin-top:50px;">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6" style="text-align:center;">

										<h3><?=$owner->company?></h3>

									</div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p><i class="fa fa-home"></i> <?=$company->adresa_pl?>, <?=$company->adresa_plloc?>, <?=$company->adresa_pljud?> <?=$company->adresa_plcodpostal?></p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->

			

			<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6"></div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p>
											<i class="fa fa-phone"></i> <?=$company->telefon_mobil?><br />
											<i class="fa fa-phone"></i> <?=$company->telefon_fix?>
										</p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->

			

			<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6"></div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p><i class="fa fa-envelope-o"></i> <?=$owner->oemail?></p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->			

		<?php if(!is_null($company->pc_nume) && !is_null($company->pc_telefon)): ?>

		<hr>

			<div class="row" style="margin-top:50px;">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6" style="text-align:center;">

										<h3>Persoana de contact:</h3>

									</div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p style="font-weight:bold;"><?=$company->pc_nume?> <?=$company->pc_prenume?> </p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->

			

			<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6"></div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p><i class="fa fa-phone"></i> <?=$company->pc_telefon?></p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->

			

			<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6"></div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p><i class="fa fa-envelope-o"></i> <?=$company->pc_email?></p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-12">

							<div class="row">

									<div class="col-sm-6 col-md-6 col-lg-6"></div>

									<!-- /col-md-6 -->

									<div class="col-sm-6 col-md-6 col-lg-6">

										<p>
											<?=$company->banca_banca?><br />
											<?=$company->banca_iban?>
										</p>

									</div>

									<!-- /col-md-6 -->

							</div>

							<!-- /row -->

					</div>

					<!-- /col-12 -->

			</div>

			<!-- /row -->

		<?php endif; ?>

			

			<hr>

			<h3 style="text-align:center;margin-bottom:50px;">Trimite-ne un mesaj!</h3>

			

			

			

			<form action="<?=base_url()?>contact/mesaj_nou" method="POST">

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

													<input class="form-control input-lg" type="text" name="email" placeholder="Introdu Email">

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

					<br>

					<div class="row" style="margin-bottom:30px;">

							<div class="col-sm-12 col-md-12 col-lg-12">

									<div class="row">

											<div class="col-sm-8 col-md-8 col-lg-8">

													<textarea rows="10" class="form-control input-lg" type="text" name="mesaj" placeholder="Scrie mesaj" required></textarea>

											</div>

											<!-- /col-md-8 -->

											<div class="col-sm-4 col-md-4 col-lg-4">

													<span class="form-label">Mesaj</span>

											</div>

											<!-- /col-md-4 -->

									</div>

									<!-- /row -->

							</div>

							<!-- /col-12 -->

					</div>

					<!-- /row -->

					

					<fieldset style="margin-top:15px;margin-bottom:20px;">

							<legend>Verificare: <?=(!is_null($error) ? '<span style="color:red;font-weight:bold">' .$error. '</span>' : "")?></legend>

							<div class="form-group required">

									<label for="input-password" class="col-sm-2 control-label">Cod verificare</label>

									<div class="col-sm-6">

											<input type="text" name="captcha" value="" placeholder="introduceti codul de mai sus" id="captcha" class="form-control" required>

									</div>

							</div>

					</fieldset>					

					

					<button type="submit" name="msjn" class="btn btn-icon btn-primary"><i class="fa fa-inbox"></i> Trimite mesaj</button>

			</form>

			

	</section>

	<!-- content -->