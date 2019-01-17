<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervari extends CI_Controller {

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
		
		$viewdata = array("page" => null, "error" => null, "oferte" => null,
			"rez" => (object) [
				'd_start' => null,
				'd_end' => null,
				'camere' => null
			]
		
		);

		$page = $this->_Pagini->GetPage(trim("rezervari"));
		if($page) $viewdata["page"] = $page;
		
		$oferte = $this->_Rezervari->getOferte();
		if($oferte)
			$viewdata["oferte"] = $oferte;		
		
		if(isset($_REQUEST["d_submit"])) {
			
			$d_start = !empty($this->input->post("d_start")) ? $this->input->post("d_start") : null;
			$d_end   = !empty($this->input->post("d_end")) ? $this->input->post("d_end") : null;
			
			// store for frontend User - d_start, d_end
			$viewdata["rez"]->d_start = $d_start;
			$viewdata["rez"]->d_end = $d_end;
			
			// date format SQL
			$d_start = date_format(date_create($d_start), 'Y-m-d');
			$d_end = date_format(date_create($d_end), 'Y-m-d');
			
			// Check Camere
			$check_camere = $this->_Rezervari->getCamereByIntervale($d_start, $d_end);
			if($check_camere) {
				$viewdata["rez"]->camere = $check_camere;
			}
				
		}

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
				0 => (object) ["viewhtml" => "pagini/js_rezervari", "viewdata" => null],
      )
    ];
		
		if(isset($page->b) && !is_null($page->b)) {
			$viewdata_banners = array("page" => null, "banner" => null);
			$viewdata_banners["page"] = $page->p;
			$viewdata_banners["banner"] = $page->b;
			
			$view->html[1] = (object) ["viewhtml" => "pagina/banner.php", "viewdata" => $viewdata_banners];
		}

	
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
	
	/**
	 * rezerva_camera
	 *
	 * param @http_id [not required, just friendly url]
	 */
	function rezerva_camera($http_id = null)
	{
		
		// if(isset($_REQUEST["rezpsubmit"])):
		if(isset($_REQUEST["rezpdata"])):
			
			$postdata = $this->input->post("rezpdata");
			$decode = json_decode(base64_decode($postdata));
			
			if(!empty($decode) && isset($decode->id_item)):
				
				$viewdata = array("page" => null, "error" => null, "camera" => null, "oferte" => null,
					"rez" => (object) [
						'd_start' => $decode->d_start,
						'd_end' => $decode->d_end,
						'id_interval' => $decode->id_interval,
						'id_item' => $decode->id_item,
						'timp_efectiv' => null,
						'total' => null
					]
				);
				
				$page = $this->_Pagini->GetPage(trim("rezervari"));
				if($page) $viewdata["page"] = $page;
				
				$camera = $this->_Object->GetItemByIdItem($this->ControllerObject, $decode->id_item);
				if($camera)
					$viewdata["camera"] = $camera;
				
				// date format SQL
				$d_start = date_format(date_create($decode->d_start), 'Y-m-d');
				$d_end = date_format(date_create($decode->d_end), 'Y-m-d');
				
				// Check It's Interval again
				$interval = $this->_Rezervari->assocBy("id_interval", $this->_Rezervari->getCamereByIntervale($d_start, $d_end));

				if($interval) {
					
					// Check if the Interval exists and can be used
					if(array_key_exists($decode->id_interval, $interval)) {
						
						$viewdata["rez"]->timp_efectiv = getDaysByDates($d_start, $d_end);
						$viewdata["rez"]->total = $interval[$decode->id_interval]->pret * getDaysByDates($d_start, $d_end);
						
					} else redirect(base_url().'rezervari');// Something happend
					
				} else redirect(base_url().'rezervari');// Something happend
				
				
				$oferte = $this->_Rezervari->getOferte();
				if($oferte)
					$viewdata["oferte"] = $oferte;
				
				$view = (object) [ 'html' => array(
					0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
					1 => null, //banner
					2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
					3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
					4 => (object) ["viewhtml" => "pagini/rezervare_camera", "viewdata" => $viewdata], //page.this
					5 => (object) ["viewhtml" => "pagina/container_end", "viewdata" => null],
					6 => null, //oferte
					7 => (object) ["viewhtml" => "pagina/wrapper_end", "viewdata" => null],
					), 'javascript' => array(
						0 => (object) ["viewhtml" => "pagini/js_rezervari", "viewdata" => null],
					)
				];	
				
				if(isset($_REQUEST["rezpfin"])):
				
					// Captcha
					if(!empty($this->input->post("captcha"))) $captcha = $this->input->post("captcha");
					if(!empty($this->input->post("captchaHash"))) $captchahash = $this->input->post("captchaHash");
					// var_dump($captchaHash, $captcha);die();
					
					if(!isset($captcha) || !isset($captchahash) || $captchahash != rpHash($captcha)) {
						
						$view->html[4]->viewdata["error"] = "Codul captcha a fost introdus gresit";

					} else {
				
						$numeprenume = !empty($this->input->post("numeprenume")) ? $this->input->post("numeprenume") : null;
						$adresa = !empty($this->input->post("adresa")) ? $this->input->post("adresa") : null;
						$telefon = !empty($this->input->post("telefon")) ? $this->input->post("telefon") : null;
						$email = !empty($this->input->post("email")) ? $this->input->post("email") : null;
						$adulti = !empty($this->input->post("adulti")) ? $this->input->post("adulti") : null;
						$copii = !empty($this->input->post("copii")) ? $this->input->post("copii") : null;

						
						$data = array(
							"numeprenume" => $numeprenume,
							"adresa" => $adresa,
							"telefon" => $telefon,
							"email" => $email,
							"adulti" => $adulti,
							"copii" => $copii,
							"d_start" => date_format(date_create($decode->d_start), 'Y-m-d'),
							"d_end" => date_format(date_create($decode->d_end), 'Y-m-d'),
							"id_interval" => intval($decode->id_interval),
							"id_item" => intval($decode->id_item),
							"timp_efectiv" => intval($decode->timp_efectiv),
							"total" => intval($decode->total),
							"created_at" => date("Y-m-d H:i:s"),
							"updated_at" => date("Y-m-d H:i:s")
						);
						
						$insert = false;
						if(!is_null($numeprenume) && !is_null($adresa) && !is_null($telefon))
							$insert = $this->_Rezervari->msqlInsert('camere_rezervari', $data);
						else $view->html[4]->viewdata["error"] = "Ne cerem scuze, a aparut o eroare. Te rugam sa incerci din nou!";
						
						if($insert)
							$view->html[4] = (object) ["viewhtml" => "pagini/rezervare_camera_success", "viewdata" => $viewdata]; //page.this
					}
				endif;				
			
				$this->frontend->render($view,
					array(
						"title_browser_ro" => $page->p->title_browser_ro,
						"meta_description" => $page->p->meta_description,
						"keywords" => $page->p->keywords
					)
				);			
				
				
			else:
				redirect(base_url().'rezervari');
			endif;

		else:
			redirect(base_url().'rezervari');
		endif;

	}
}
