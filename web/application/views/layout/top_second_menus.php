<?php
// ini_set('xdebug.var_display_max_depth', -1);
// ini_set('xdebug.var_display_max_children', -1);
// ini_set('xdebug.var_display_max_data', -1);
// var_dump($menus);die();

?>
						<?php if(!is_null($menus)): ?>
						<div class="col-sm-8 col-md-12 col-lg-8">
							<nav id="main-nav">
								<ul>
								<?php foreach( array_reverse($menus, true) as $keymenu => $menu): ?>
				
								<?php
									if($menu->fullpath == "/" || $menu->fullpath == "acasa" || $menu->fullpath == "homepage" || $menu->fullpath == "index" || $menu->fullpath == "index.php") $menu->fullpath = "";
								?>
								
								<?php
									if($menu->item_parent_fake && isset($menus[$keymenu+1]) && $menus[$keymenu+1]->item_parent_fake || $menu == end($menus)) {
										
										$href = base_url().$menu->fullpath;
										echo '<li><a href="' .$href. '">' .$menu->item_name. '</a></li>';
									} else {
										
										echo '<li>';
											echo '<a href="javascript:void(0)">' .$menu->item_name. '</a>';
											echo '<ul>';
										foreach($menu->childrens as $child) {
											echo '<li><a href="' .base_url().$child->fullpath. '">' .$child->item_name. '</a></li>';
										}
											echo '</ul>';
										echo '</li>';
									}
								?>									
									
								<?php endforeach; ?>
								</ul>
							</nav>
						</div><!-- /8 columns -->
						<?php endif; ?>