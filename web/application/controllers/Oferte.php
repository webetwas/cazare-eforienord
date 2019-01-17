<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oferte extends CI_Controller {

	private $ControllerObject;
	
	public function __construct() {
		
		parent::__construct();
		// Your own constructor code

		$this->load->model('Pagini_model', '_Pagini');
		$this->load->model('Rezervari_model', '_Rezervari');
		
		$this->load->helper('tiny_helper');
		
		$this->ControllerObject = $this->_Object->getObjectStructure("camere");
	}

	/**
	 * [Index]
	 * @return [type] [description]
	 */
	public function index()
	{
		
		$viewdata = array("page" => null, "error" => null,
			"rez" => (object) [
				'oferte' => null
			]
		
		);

		$page = $this->_Pagini->GetPage(trim("oferte"));
		if($page) $viewdata["page"] = $page;
		
		$oferte = $this->_Rezervari->getOferte();
		if($oferte)
			$viewdata["rez"]->oferte = $oferte;
		
		// var_dump($oferte);


		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => null, //banner
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagini/" .$page->s->filehtml, "viewdata" => $viewdata],
			5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			6 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				0 => (object) ["viewhtml" => "pagini/js_oferte", "viewdata" => null],
      )
    ];
		
		if(isset($page->b) && !is_null($page->b)) {
			$viewdata_banners = array("page" => null, "banner" => null);
			$viewdata_banners["page"] = $page->p;
			$viewdata_banners["banner"] = $page->b;
			
			$view->html[1] = (object) ["viewhtml" => "pagina/banner.php", "viewdata" => $viewdata_banners];
		}
		
		// var_dump($view);die();

		$this->frontend->render($view,
			array(
				"title_browser_ro" => $page->p->title_browser_ro,
				"meta_description" => $page->p->meta_description,
				"keywords" => $page->p->keywords
			)
		);
	}
	
	public function ajxroom($id_item)
	{
		
		$res = array("status" => 0, "html" => null, "js" => null);
		
		$camera = $this->_Object->GetItemByIdItem($this->ControllerObject, $id_item);
		if($camera) {
			
			$html_rel = getSomeStringByInt("camcoll", $camera->id_item);
			
			
			$res["status"] = 1;
			
			// $res["html"] = $camera->titlu_prezentare;
			$res["html"] = "";
			$res["html"] .= '<div class="row">';//row
			$res["html"] .= '<div class="col-sm-6">';//col-sm-6
			$res["html"] .= '<h4 class="col8"><strong><a href="' .base_url(). 'camera/' .$camera->http_id. '" target="_blank" style="color:black;text-decoration:underline;">' .(!is_null($camera->titlu_prezentare) ? $camera->titlu_prezentare : $camera->item_name). '&nbsp;</a></strong></h4><hr style="margin:0;">';
			$res["html"] .= '<p>' .$camera->i_content_ro. '</p>';
			$res["html"] .= '</div>';//col-sm-6
			if($camera->i):
				
				$res["html"] .= '<div class="col-sm-6">';//col-sm-6
				$res["html"] .= '<div class="gallery"><div class="row">';
				foreach($camera->i as $img):
				
					$res["html"] .= '<div class="col-sm-4 col-md-4 col-lg-4 img-small">';
					$res["html"] .= '<div class="media">';
					$res["html"] .= '<a href="' .base_url().PATH_IMG_CAMERE. 'l/' .$img->img. '" rel="' .$html_rel. '">';
					$res["html"] .= '<img src="' .base_url().PATH_IMG_CAMERE. 's/' .$img->img. '" data-src="' .base_url().PATH_IMG_CAMERE. 's/' .$img->img. '" alt="" border="0" style="" class="img-responsive"/></a>';
					$res["html"] .= '</div>';
					$res["html"] .= '</div>';
				
				endforeach;
				$res["html"] .= '</div></div>';
				
				
				$res["html"] .= '</div>';//col-sm-6
				
				$res["js"] = "<script type=\"text/javascript\">function {$html_rel}() {
				$('a[rel={$html_rel}]').fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
            return '<span id=\"fancybox-title-over\">Imagine ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    }); }; {$html_rel}();</script>";
			
			endif;
			$res["html"] .= '</div>';//row
		}
		
		header("Content-Type: application/json");
		echo json_encode($res);

	}
}
