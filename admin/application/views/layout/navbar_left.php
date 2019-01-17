<?php
// var_dump($application->owner);die();
?>

<?php
$ctrl = "admin";
$ctrl2 = false;

if(!empty($this->uri->segment(1, 0))) $ctrl = $this->uri->segment(1, 0);
if(!empty($this->uri->segment(2, 0))) $ctrl2 = $this->uri->segment(2, 0);
?>

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" style="border-radius:0;max-width:150px;" src="<?=(isset($application->owner->image_logo) && !is_null($application->owner->image_logo) ? SITE_URL.PATH_IMG_MISC. '/' .$application->owner->image_logo : 'public/assets/img/logo/default-logo.jpg');?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
													<span class="text-muted text-xs block"><?=($application->user->privilege ? "SUPERADMIN" : $application->user->user_name)?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?=base_url();?>platforma/setari/companie/item/u/id/<?=$application->owner->id;?>">Contul meu</a></li>
                            <li class="divider"></li>
                            <li><a class="swloader" href="<?=base_url();?>platforma/setari/utilizator/item/u/id/<?=$application->user->id;?>"><?=$application->user->user_name;?></a></li>
                            <li><a href="<?=base_url();?>login/getout">Iesi din cont</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                      <?=$application->owner->initial;?>
                    </div>
                </li>
                <li <?=($ctrl == "admin" || $ctrl == "platforma" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>"><i class="fa fa-home"></i> <span class="nav-label">Administrare</span></a>
                </li>
								<?php if($application->user->privilege): ?>
                <li <?=($ctrl == "legaturi" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>legaturi"><i class="fa fa-cogs" style="color: #1c84c6;"></i> <span class="nav-label">Legaturi</span></a>
                </li>
								<?php endif; ?>
                <li <?=($ctrl == "camere" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>camere"><i class="fa fa-bank"></i> <span class="nav-label">Camere</span></a>
                </li>
                <li <?=($ctrl == "rezervari" ? 'class="active"' : "");?> style="border-bottom:2px solid red;">
                   <a href="<?=base_url()?>rezervari"><i class="fa fa-id-badge"></i> <span class="nav-label">Rezervari</span></a>
                </li>
                <li <?=($ctrl == "galerie_foto" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>galerie_foto"><i class="fa fa-camera-retro"></i> <span class="nav-label">Galerie foto</span></a>
                </li>
                <li <?=($ctrl == "galerie_video" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>galerie_video"><i class="fa fa-video-camera"></i> <span class="nav-label">Galerie video</span></a>
                </li>
								<?php if($application->user->privilege): ?>
                <li <?=($ctrl == "meniuri" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>meniuri"><i class="fa fa-list-ul"></i> <span class="nav-label">Meniuri</span></a>
                </li>
								<?php endif; ?>
                <li <?=($ctrl == "pagini" ? 'class="active"' : "");?>>
									<a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Pagini site</span><span class="fa arrow"></span></a>
									<ul class="nav nav-second-level collapse">
									<?php
										if(!$listpages)
											echo '<li><a href="javascript:void(0);">Nu exista pagini</a></li>';
										else {
											foreach($listpages as $lp) {
												echo '<li><a class="swloader" href="' .base_url(). 'pagini/item/u/id/' .$lp->id. "/" .$lp->id_page. '">' .$lp->title. '</a></li>';
											}
										}
									?>
									</ul>
                </li>
                <li <?=($ctrl == "aranjarea_elementelor_in_pagina" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>aranjarea_elementelor_in_pagina"><i class="fa fa-heart" style="color:#1ab394;"></i> <span class="nav-label">Aranjeaza elementele</span></a>
                </li>
                <li <?=($ctrl == "newsletter" ? 'class="active"' : "");?>>
                   <a href="<?=base_url()?>newsletter"><i class="fa fa-envelope-open-o"></i> <span class="nav-label">Newsletter</span></a>
                </li>
            </ul>

        </div>
    </nav>