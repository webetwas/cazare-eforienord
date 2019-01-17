<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {


	public function __construct() {
		
		parent::__construct();
		// Your own constructor code

		$this->load->model('Pagini_model', '_Pagini');
		$this->load->model('Object_model', '_Object');
		
		$this->load->helper('tiny_helper');
	}

	/**
	 * [Index]
	 * @return [type] [description]
	 */
	public function index()
	{
		
		$viewdata = array("page" => null, "error" => null);

		$page = $this->_Pagini->GetPage(trim("contact"));
		if($page) $viewdata["page"] = $page;


		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => (object) ["viewhtml" => "layout/header_v1_start", "viewdata" => null],
			2 => (object) ["viewhtml" => "layout/google_map", "viewdata" => null],
			
			3 => (object) ["viewhtml" => "layout/header_v2_end", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			5 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			6 => (object) ["viewhtml" => "pagini/" .$page->s->filehtml, "viewdata" => $viewdata],
			7 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			
			8 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				0 => (object) ["viewhtml" => "pagini/js_contact", "viewdata" => null],
			)
    ];
			
		
		// var_dump($view);die();

		$this->frontend->render($view,
			array(
				"title_browser_ro" => $page->p->title_browser_ro,
				"meta_description" => $page->p->meta_description,
				"keywords" => $page->p->keywords
			)
		);
	}
	
	public function newsletter()
	{
		
		$viewdata = array("page" => null, "error" => null, "mesaj" => null);
		
		if(isset($_REQUEST["nlettsub"])) {
			
				$numeprenume = !empty($this->input->post("numeprenume")) ? $this->input->post("numeprenume") : null;
				$email = !empty($this->input->post("email")) ? $this->input->post("email") : null;
				
				if(!is_null($numeprenume) && !is_null($email)) {
					
					$data = array("numeprenume" => $numeprenume, "email" => $email);
					
					$insert = $this->_Object->msqlInsert('newsletter', $data);
					if($insert)
						$viewdata["mesaj"] = '<h1 style="text-align:center;">Gata!<br /> <span style="color:#259aad;">Te-ai inscris la Newsletter</span>.</h1>';
					else
						$viewdata["mesaj"] = '<h2 style="text-align:center;color:red;">Ne cerem scuze, a aparut eroare. Te rugam sa incerci din nou!</h2>';
					
				} else redirect(base_url(). "contact");

			
		} else
			redirect(base_url(). "contact");

		

		$page = $this->_Pagini->GetPage(trim("contact"));
		if($page) $viewdata["page"] = $page;

		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			2 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			3 => (object) ["viewhtml" => "blocuri/contact_mesaj", "viewdata" => $viewdata],
			4 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			5 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => null
    ];
			
		
		// var_dump($view);die();

		$this->frontend->render($view,
			array(
				"title_browser_ro" => $page->p->title_browser_ro,
				"meta_description" => $page->p->meta_description,
				"keywords" => $page->p->keywords
			)
		);		
		
	}
	
	public function mesaj_nou()
	{
		$viewdata = array("page" => null, "error" => null, "mesaj" => null);
		
		if(isset($_REQUEST["msjn"])) {
			
						// Captcha
			if(!empty($this->input->post("captcha"))) $captcha = $this->input->post("captcha");
			if(!empty($this->input->post("captchaHash"))) $captchahash = $this->input->post("captchaHash");
			// var_dump($captchaHash, $captcha);die();
			
			if(!isset($captcha) || !isset($captchahash) || $captchahash != rpHash($captcha)) {
				
				$viewdata["error"] = "Codul captcha a fost introdus gresit";

			} else {
			
				$numeprenume = !empty($this->input->post("numeprenume")) ? $this->input->post("numeprenume") : null;
				$telefon = !empty($this->input->post("telefon")) ? $this->input->post("telefon") : null;
				$email = !empty($this->input->post("email")) ? $this->input->post("email") : null;
				$mesaj = !empty($this->input->post("mesaj")) ? $this->input->post("mesaj") : null;
				
				if(!is_null($numeprenume) && !is_null($telefon) && !is_null($mesaj)) {
					
					$data = array("numeprenume" => $numeprenume, "telefon" => $telefon, "email" => $email, "mesaj" => $mesaj);
					
					// $insert = $this->_Object->msqlInsert('newsletter', $data);
					// if($insert)
					$viewdata["mesaj"] = '<h1 style="text-align:center;">Am primit mesajul tau!<br /> <span style="color:#259aad;">Iti multumim!</span></h1>';

				} else $viewdata["mesaj"] = '<h2 style="text-align:center;color:red;">Ne cerem scuze, a aparut eroare. Te rugam sa incerci din nou!</h2>';
			
			}
		} else
			redirect(base_url(). "contact");

		

		$page = $this->_Pagini->GetPage(trim("contact"));
		if($page) $viewdata["page"] = $page;

		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			2 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			3 => (object) ["viewhtml" => "blocuri/contact_mesaj", "viewdata" => $viewdata],
			4 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			5 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				0 => (object) ["viewhtml" => "pagini/js_contact", "viewdata" => null],
			)
    ];
		
		if(!is_null($viewdata["error"]))
			$view->html[3]->viewhtml = "pagini/" .$page->s->filehtml;
			
		
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
