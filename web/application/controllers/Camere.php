<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camere extends CI_Controller {

	private $ControllerObject;

	public function __construct() {
		parent::__construct();
		// Your own constructor code
		

		$this->load->model('Pagini_model', '_Pagini');
		$this->load->model('Object_model', '_Object');
		
		
		$this->ControllerObject = $this->_Object->getObjectStructure("camere");
	}

	/**
	 * [Index]
	 * @return [type] [description]
	 */
	public function index()
	{
		$viewdata = array("page" => null, "error" => null, "camere" => null);

		$page = $this->_Pagini->GetPage(trim("camere"));
		if($page) $viewdata["page"] = $page;
		
		$camere = $this->_Object->msqlGetAll('camere');
		
		if($camere) {
			foreach($camere as $keycamera => $camera) {
				
				$camere[$keycamera]->i = $this->_Object->msqlGetAll('camere_images', array("id_item" => $camera->id_item));
			}
			$viewdata["camere"] = $camere;
		}

		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagina/camere", "viewdata" => $viewdata],
			5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			6 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				4 => (object) ["viewhtml" => "pagina/js_camere", "viewdata" => null]
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

	/**
	 * [page description]
	 * @param  [type] $id_page [description]
	 * @return [type]          [description]
	 */
	public function camera($http_id)
	{

		$viewdata = array("page" => null, "error" => null, "camera" => null);

		$page = $this->_Pagini->GetPage(trim("camere"));
		if($page) $viewdata["page"] = $page;

		
		$camera = $this->_Object->GetItemWhttp_id($this->ControllerObject, $http_id);
		if($camera) {
			$camera->video = null;
			
			if($camera->id_video) {
				
				$camera_video = $this->_Object->msqlGet('galerie_video', array("id_item" => $camera->id_video));
				
				if($camera_video) {

					
					$camera_video->i = $this->_Object->msqlGet('galerie_video_images', array("id_item" => $camera_video->id_item));
					
					$camera->video = $camera_video;
				}
			}
			
			if($camera->id_video2) {
				
				$camera_video2 = $this->_Object->msqlGet('galerie_video', array("id_item" => $camera->id_video2));
				
				if($camera_video2) {

					
					$camera_video2->i = $this->_Object->msqlGet('galerie_video_images', array("id_item" => $camera_video2->id_item));
					
					$camera->video2 = $camera_video2;
				}
			}
			
			$viewdata["camera"] = $camera;
		}
		
		// var_dump($camera);die();

		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			4 => (object) ["viewhtml" => "pagina/" .$page->s->filehtml, "viewdata" => $viewdata],
			5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
			6 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
      ), 'javascript' => array(
				4 => (object) ["viewhtml" => "pagina/" .$page->s->filejs, "viewdata" => null]
			)
    ];
			
		
		// var_dump($view);die();

		$this->frontend->render($view,
			array(
				"title_browser_ro" => (!is_null($camera->http_title_browser) ? $camera->http_title_browser : $page->p->title_browser_ro),
				"meta_description" => (!is_null($camera->http_meta_description) ? $camera->http_meta_description : $page->p->meta_description),
				"keywords" => (!is_null($camera->http_keywords) ? $camera->http_keywords : $page->p->keywords),
			)
		);
	}
}
