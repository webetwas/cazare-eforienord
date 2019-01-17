<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);

class Galerie extends CI_Controller {

	// private $ControllerObject;

	public function __construct() {
		parent::__construct();
		// Your own constructor code
		

		$this->load->model('Pagini_model', '_Pagini');
		$this->load->model('Object_model', '_Object');
		$this->load->model('Rezervari_model', '_Rezervari');
		
		
		// $this->ControllerObject = $this->_Object->getObjectStructure("camere");
	}

	/**
	 * [Index]
	 * @return [type] [description]
	 */
	public function index()
	{
		redirect(base_url());
	}
	
	/**
	 * [page galerie_foto]
	 * @return [type]          [description]
	 */	
	public function galerie_foto()
	{
		
		$viewdata = array("page" => null, "error" => null, "galerie" => null, "oferte" => null);
		
		$page = $this->_Pagini->GetPage(trim("galerie_foto"));
		if($page) $viewdata["page"] = $page;
		
		$galerie = $this->_Object->getContentItemsFull("galerie_foto", "38e048d22b7a2ef6967a2c8ba63dd67e");
		if($galerie) {
			
			$images = array();
			// we must parse any Object's images
			foreach($galerie as $gal) {
				
				if($gal->item->images) {
					
					foreach($gal->item->images as $img) {
						
						$img->item_name = null;
						
						if(!empty($gal->item->item_name))
							$img->item_name = $gal->item->item_name;
						$images[] = $img;
					}
				}
			}
			
			
			if(!empty($images)) $viewdata["galerie"] = $images;
		}
		
		$oferte = $this->_Rezervari->getOferte();
		if($oferte)
			$viewdata["oferte"] = $oferte;
		
		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => null, //banner
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagini/" .$page->s->filehtml, "viewdata" => $viewdata],
			5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			6 => null, //oferte
			7 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				4 => (object) ["viewhtml" => "pagini/" .$page->s->filejs, "viewdata" => null]
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
	
	/**
	 * [page galerie_video]
	 * @return [type]          [description]
	 */	
	public function galerie_video()
	{
		
		$viewdata = array("page" => null, "error" => null, "galerie" => null, "oferte" => null);
		
		$page = $this->_Pagini->GetPage(trim("galerie_video"));
		if($page) $viewdata["page"] = $page;
		
		$galerie = $this->_Object->getContentItemsFull("galerie_video", "375c7f26fdc1fe95bac7bfa466696577");
		if($galerie) {
			
			$images = array();
			// we must parse each Object's Images
			foreach($galerie as $gal) {
				
				if($gal->item->images) {
					
					foreach($gal->item->images as $img) {
						
						$img->item_name = null;
						$img->item_videocode = null;
						
						if(!empty($gal->item->item_name))
							$img->item_name = $gal->item->item_name;
						
						if(!empty($gal->item->item_videocode))
							$img->item_videocode = $gal->item->item_videocode;
						
						$images[] = $img;
					}
				}
			}
			
			
			if(!empty($images)) $viewdata["galerie"] = $images;
		}
		
		$oferte = $this->_Rezervari->getOferte();
		if($oferte)
			$viewdata["oferte"] = $oferte;
		
		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => null, //banner
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagini/" .$page->s->filehtml, "viewdata" => $viewdata],
			5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			6 => null, //oferte
			7 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				4 => (object) ["viewhtml" => "pagini/" .$page->s->filejs, "viewdata" => null]
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
	
}
