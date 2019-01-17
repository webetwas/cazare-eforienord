<?php
// var_dump($page);die();
?>
        <section class="wrapper">
          <div class="container">
            <br>
            <br>
            <div class="row">
              <div class="col-md-<?=($page->i && !is_null($page->i) ? '8' : "12")?>">
								<?=(!is_null($page->p->content_ro) ? $page->p->content_ro : "")?>
              </div>
							
							<?php if($page->i && !is_null($page->i)): ?>
              <div class="col-md-4">
								<img src="<?=base_url() .PATH_IMG_PAGINA. 'm/' .$page->i[0]->img?>">
							</div>
							<?php endif; ?>
							
            </div>
            <div class="row text-center">
              <a href="<?=base_url()?>despre_noi" class="btn btn-primary">Citeste mai mult</a>
            </div>
            <hr>
        </section>