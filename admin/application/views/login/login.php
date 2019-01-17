<?php
// var_dump($application);die();
?>

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><?=$application->owner->td_company;?></h1>

            </div>				
				
            <h3><?=$application->owner->company;?> - Bine ai venit!</h3>
            <p><?=$application->owner->about;?>
                <!--Continually expanded and constantly improved by WebEtwas.com-->
            </p>
						<p><?=(isset($error) ? '<label style="color:red">'.$error. '</label>' : "")?></p>
            <form class="m-t" role="form" action="<?=base_url();?>login/getin" id="lgetin" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Utilizator" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Parola" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Intra in cont</button>

            </form>
            <p class="m-t"> <a href="http://<?=$application->owner->td_website?>"><small>&copy; 2017</small> <?=$application->owner->td_company;?></a></p>
        </div>
    </div>