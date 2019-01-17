<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Your own constructor code

		$this->load->model('Pagini_model', '_Pagini');
	}

	/**
	 * [Index]
	 * @return [type] [description]
	 */
	public function index()
	{
		$viewdata = array("page" => null, "sliders" => null);

		$page = $this->_Pagini->GetPage("acasa");
		if($page) $viewdata["page"] = $page;
		
		$sliderDATA = array("sliders" => $page->b);


		$view = (object) [ 'html' => array(
      0 => (object) ["viewhtml" => 'layout/slider', "viewdata" => $sliderDATA],
      1 => (object) ["viewhtml" => 'blocuri/rezervari_simple', "viewdata" => null],
      2 => (object) ["viewhtml" => 'pagini/' .$page->s->filehtml, "viewdata" => $viewdata],
			3 => (object) ["viewhtml" => "blocuri/bloc_text_undenegasiti", "viewdata" => null],
			4 => (object) ["viewhtml" => "layout/google_map", "viewdata" => null]
		
      ), 'javascript' => array(
				1 => (object) ["viewhtml" => "blocuri/js_rezervari_simple", "viewdata" => null],
      )
    ];
		
		$viewdata["sliders"] = $page->b;
		
		$this->frontend->slider = true;
		$this->frontend->rezervari_simple = true;
		$this->frontend->render($view,
			array(
				"title_browser_ro" => $page->p->title_browser_ro,
				"meta_description" => $page->p->meta_description,
				"keywords" => $page->p->keywords
			)
		);
	}

	/**
	 * [page description]
	 * @param  [type] $id_page [description]
	 * @return [type]          [description]
	 */
	public function page($id_page)
	{

		$viewdata = array("page" => null, "error" => null);

		$page = $this->_Pagini->GetPage(trim($id_page));
		// var_dump($page);die();
		if($page) $viewdata["page"] = $page;

		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => null, //banner
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagina/" .$page->s->filehtml, "viewdata" => $viewdata],
			5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			6 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				4 => (object) ["viewhtml" => "pagina/js_pagina", "viewdata" => null]
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
