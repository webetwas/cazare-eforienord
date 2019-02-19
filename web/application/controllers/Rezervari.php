<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervari extends CI_Controller {

	private $ControllerObject;
	
	public function __construct() {
		
		parent::__construct();
		// Your own constructor code

		$this->load->model('Pagini_model', '_Pagini');
		$this->load->model('Rezervari_model', '_Rezervari');
		$this->load->model('Sendemail_model', '_Sendemail');
		$this->load->model('Object_model', '_Object');
		
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
				'camere' => null,
				'tip_camera' => null,
				'tip_camera_id' => null,
				'timp_efectiv' => null
			]
		
		);
		
		$page = $this->_Pagini->GetPage(trim("rezervari"));
		if($page) $viewdata["page"] = $page;
		
		$oferte = $this->_Rezervari->getOferte();
		if($oferte)
			$viewdata["oferte"] = $oferte;	

		$camere  = $this->_Object->msqlGetAll('camere', null);
		if($camere)
			$viewdata["camere"] = $camere;		
		foreach($camere as $key => $c):
			$camere_intervale = $this->_Object->msqlGetAll('camere_intervale', array("id_item" => $c->id_item));
			if($camere_intervale)
				$viewdata["camere_intervale"][$c->id_item] = $camere_intervale;			
		endforeach;	
		
		if(isset($_REQUEST["d_submit"])) {
			
			$d_start_home = !empty($this->input->post("d_start")) ? $this->input->post("d_start") : null;
			$d_end_home   = !empty($this->input->post("d_end")) ? $this->input->post("d_end") : null;
			$tip_camera   = !empty($this->input->post("tip_camera")) ? $this->input->post("tip_camera") : null;
			$tip_camera_id   = !empty($this->input->post("tip_camera_id")) ? $this->input->post("tip_camera_id") : null;
			/*Calculare pret*/
			$pret=0;
			$camere_intervale  = $this->_Object->msqlGetAll('camere_intervale', array("id_item" => $tip_camera_id));
			$timp_efectiv = getDaysByDates($d_start_home, $d_end_home);
			foreach($camere_intervale as $key => $c){
				$date_start = $c->date_start;
				$date_end = $c->date_end;
				$date_start = date_format(date_create($date_start), 'Y-m-d');
				$date_end = date_format(date_create($date_end), 'Y-m-d');
				for($i=0;$i<$timp_efectiv;$i++){					
					$day = $d_start_home;
					$day = date_format(date_create($day), 'Y-m-d');
					$day = date('Y-m-d', strtotime($day. ' + '.$i.' days'));
					//echo $day."<br>";
					if (($day >= $date_start) && ($day <= $date_end)){
						$pret+=$c->pret;
					}
				}						
			}	
			/*Calculare pret*/	
			// store for frontend User - d_start, d_end
			$viewdata["rez"]->d_start = $d_start_home;
			$viewdata["rez"]->d_end = $d_end_home;
			$viewdata["rez"]->tip_camera = $tip_camera;
			$viewdata["rez"]->tip_camera_id = $tip_camera_id;
			$viewdata["rez"]->pret = $pret;
		}

		$view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "pagina/wrapper_start", "viewdata" => null],
			1 => null, //banner
			2 => (object) ["viewhtml" => "pagina/container_start", "viewdata" => null],
			3 => (object) ["viewhtml" => "pagina/pagina_leftsidebar", "viewdata" => null],
			// 4 => (object) ["viewhtml" => "pagini/" .$page->s->filehtml, "viewdata" => $viewdata],
			4 => (object) ["viewhtml" => "pagini/rezervare_camera", "viewdata" => $viewdata], //page.this
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

		if(isset($_REQUEST["rezpfin"])):
			// Captcha
			if(!empty($this->input->post("captcha"))) $captcha = $this->input->post("captcha");
			if(!empty($this->input->post("captchaHash"))) $captchahash = $this->input->post("captchaHash");
			// var_dump($captchaHash, $captcha);die();
			
			if(!isset($captcha) || !isset($captchahash) || $captchahash != rpHash($captcha)) {
				
				$view->html[4]->viewdata["error"] = "Codul captcha a fost introdus gresit";

			} else {
		
				$d_start = !empty($this->input->post("d_start")) ? $this->input->post("d_start") : null;
				$d_end = !empty($this->input->post("d_end")) ? $this->input->post("d_end") : null;

				$numeprenume = !empty($this->input->post("numeprenume")) ? $this->input->post("numeprenume") : null;
				$telefon = !empty($this->input->post("telefon")) ? $this->input->post("telefon") : null;
				$email = !empty($this->input->post("email")) ? $this->input->post("email") : null;
				$adulti = !empty($this->input->post("adulti")) ? $this->input->post("adulti") : "0";
				$copii = !empty($this->input->post("copii")) ? $this->input->post("copii") : "0";
				$tip_camera_id = !empty($this->input->post("tip_camera_id")) ? $this->input->post("tip_camera_id") : null;
				$total_pret = !empty($this->input->post("total_pret")) ? $this->input->post("total_pret") : null;
				$timp_efectiv = getDaysByDates($d_start, $d_end);;

				
				$data = array(
					"id_camera" => $tip_camera_id,
					"numeprenume" => $numeprenume,
					"telefon" => $telefon,
					"email" => $email,
					"adulti" => $adulti,
					"copii" => $copii,					
					"timp_efectiv" => intval($timp_efectiv),				
					"total" => intval($total_pret),				
					"d_start" => date_format(date_create($d_start), 'Y-m-d'),
					"d_end" => date_format(date_create($d_end), 'Y-m-d'),
					"created_at" => date("Y-m-d H:i:s"),
					"updated_at" => date("Y-m-d H:i:s")
				);
				
				// var_dump($this->frontend->user_name->email);die();
				
				//$this->_Sendemail->newRezervare($data, $this->frontend->user_name->email);
				$insert = $this->_Rezervari->msqlInsert('camere_rezervari', $data);
				$viewdata['id_rezervare']=$insert;
				$viewdata['id_rezervare']=explode("int(",$viewdata['id_rezervare']);;
				
				$view->html[4] = (object) ["viewhtml" => "pagini/rezervare_camera_success", "viewdata" => $viewdata,'id_rezervare',$viewdata['id_rezervare']]; //page.this
			}
		endif;		
	
	
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
