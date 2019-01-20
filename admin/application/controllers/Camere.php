<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camere extends CI_Controller {

	private $ControllerObject;

  /**
	 * [private Controller]
	 * @var [type]
	 */
	private $controller;
	private $controller_fake;
  private $controller_ajax;

	/**
	 * [private URI - Segment]
	 * @var [type]
	 */
	private $uriseg;

  public function __construct() {
    parent::__construct();
    // Your own constructor code

    $this->controller = $this->router->fetch_class();//Controller
		
		$this->controller_fake = $this->controller;
    $this->controller_ajax = $this->controller;
		$this->uriseg = json_decode(json_encode($this->uri->uri_to_assoc(2)));

    if(!$this->user->id) redirect("login");
		
    $this->load->model("Item_model", "_Item");// model/_Item
		$this->load->model("Chain_model", "_Chain");// model/_Chain
		$this->load->model("Object_model", "_Object");// model/_Categories
		$this->load->model('Pagini_model', '_Pagini');// model/_Pagini
		$this->load->model("Upload_model", "_Upload");// model/_Upload
		
		$this->load->helper('tiny_helper');
		
		$this->ControllerObject = $this->_Object->getObjectStructure(strtolower($this->controller));
		
		if(!$this->ControllerObject) exit("Couldn't find Controller's Object");
		
		// var_dump($this->ControllerObject);die();
  }
	
	/**
	 * [proiecte description]
	 * @return [type] [description]
	 */
  public function index()
  {
		
		$viewdata = array("items" => null, "items_json" => null, "controller_fake" => $this->controller_fake, "controller_ajax" => $this->controller_fake. "/ajax/", "uri" => null, "imgpathitem" => null);
		$viewdata["uri"] = $this->uriseg;
		$viewdata["imgpathitem"] = SITE_URL.PATH_IMG_CAMERE;
		
		$items = $this->_Item->msqlGetAll($this->ControllerObject->obj_table);
		if($items) {
			
			$items_json = array();
			
			
			foreach($items as $keyitem => $item) {
				
				$item->i = $this->_Item->msqlGetAll($this->ControllerObject->obj_table_img, array("id_item" => $item->id_item));
				
				$items_json[$item->id_item] = array(
					'id_item' => $item->id_item,
					'item_name' => $item->item_name,
					'titlu_prezentare' => $item->titlu_prezentare
					
				);
			}
			
			$viewdata["items"] = $items;
			$viewdata["items_json"] = json_encode($items_json);
		}
		
		// var_dump($items_json);die();
		
		//breacrumb
		$breadcrumb = array("bb_titlu" => "Camere", "bb_button" => null, "breadcrumb" => array());
		$breadcrumb["bb_button"] = array("text" => '<i class="fa fa-plus-square"></i> Adauga camera', "linkhref" => $this->controller_fake ."/item/i");
		
		$breadcrumb["breadcrumb"][0] = array("text" => "Administrare", "url" => '/');
		$breadcrumb["breadcrumb"][1] = array("text" => "Camere", "url" => null);
    $view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "layout/breadcrumb", "viewdata" => $breadcrumb],
      1 => (object) ["viewhtml" => "camere/index", "viewdata" => $viewdata],
      2 => (object) ["viewhtml" => "camere/js_index", "viewdata" => $viewdata]
      ), 'javascript' => null
			// 'javascript' => array(
      // 1 => (object) ["viewhtml" => "camere/js_index", "viewdata" => null],
      // )
    ];
    $this->frontend->render($view);
  }	
	
	/**
	 * Item
	 */
	public function item()
	{
		
		$this->load->helper('text');
		
		$viewdata = array("controller" => $this->controller, "controller_fake" => $this->controller_fake, "controller_ajax" => $this->controller_fake. "/ajax/", "item" => null, "item_links" => null, "links" => null, "videolist" => null, "uri" => null, "form" => (object) [], "imgpathitem" => null);
		$viewdata["uri"] = $this->uriseg;
		$viewdata["imgpathitem"] = SITE_URL.PATH_IMG_CAMERE."m/";
		// var_dump($this->uriseg);
	
		// FORM - Item
		$viewdata["form"]->item = (object) ["name" => "item", "prefix" => "it", "segments" => $this->controller_fake. "/item/" .$this->uriseg->item. ($this->uriseg->item == "u" && isset($this->uriseg->id) && !is_null($this->uriseg->id) ? "/id/" .trim(intval($this->uriseg->id)) : "")];
		$form_submititem = $viewdata["form"]->item->prefix. "submit";//submit<button>	
    
		// FORM - Meta
		$viewdata["form"]->meta = (object) ["name" => "meta", "prefix" => "mt", "segments" => $this->controller_fake. "/item/" .$this->uriseg->item. ($this->uriseg->item == "u" && isset($this->uriseg->id) && !is_null($this->uriseg->id) ? "/id/" .trim(intval($this->uriseg->id)) : "")];
		$form_submitmeta = $viewdata["form"]->meta->prefix. "submit";//submit<button>		
		
		switch($this->uriseg->item)
    {
      case UPDATE:
				if(isset($this->uriseg->id) && !is_null($this->uriseg->id)):
				
					if(!is_null($this->ControllerObject->targetchains)) {
							
						$links = $this->_Chain->getLinksByConditions(json_decode($this->ControllerObject->targetchains));
						// Target Chains
					} else {
						$links = $this->_Chain->getAllLinks();
					}
					$links ? $viewdata["links"] = $links : $viewdata["links"] = null;
				
					$item = $this->_Item->msqlGet($this->ControllerObject->obj_table, array("id_item" => trim(intval($this->uriseg->id))));
					if($item) {
						$item->i = $this->_Item->msqlGetAll($this->ControllerObject->obj_table_img, array("id_item" => $item->id_item));
						$viewdata["item"] = $item;
					}
					
					$item_links = $this->_Chain->getIIDS_LinksByAnObjectItem($this->ControllerObject->id_object, trim(intval($this->uriseg->id)));
					if($item_links) $viewdata["item_links"] = $item_links;
					
					$video_list = $this->_Item->msqlGetAll('galerie_video');
					if($video_list)
						$viewdata["videolist"] = $video_list;
					
					
					/* form @item */
					if(isset($_REQUEST["{$form_submititem}"])) {
						!empty($this->input->post("{$viewdata["form"]->item->prefix}item_name")) ? $http_id = convert_accented_characters(str_replace(" ", "_", trim(strtolower($this->input->post("{$viewdata["form"]->item->prefix}item_name"))))) : $http_id = false;
					
						$newDBPattern = (object) [ // Design Database Pattern
							"table" => $this->ControllerObject->obj_table,
							"database" => UPDATE,
							"type" => PUT,
							"design" => array(
								"item_name" => true,
								"id_video" => true,
								"id_video2" => true,
								"i_content_ro" => true,
								"titlu_prezentare" => true,
								"http_id" => $http_id
							)
						]; 
						$update = $this->_Item->UPItem($newDBPattern->table, $viewdata["form"]->item->prefix, $newDBPattern, array("c" => "id_item", "v" => trim(intval($this->uriseg->id))));// update@Item
						if($update) $this->_Session->setFB_Pozitive(array("ref" => $item->item_name, "text" => "Modificarile tale au fost salvate!"));
						redirect($viewdata["form"]->item->segments);
						
					/* form @meta */
					} elseif(isset($_REQUEST["{$form_submitmeta}"])) {
					
						$newDBPattern = (object) [ // Design Database Pattern
							"table" => $this->ControllerObject->obj_table,
							"database" => UPDATE,
							"type" => PUT,
							"design" => array(
								"http_title_browser" => true,
								"http_meta_description" => true,
								"http_keywords" => true
							)
						]; $update = $this->_Item->UPItem($newDBPattern->table, $viewdata["form"]->meta->prefix, $newDBPattern, array("c" => "id_item", "v" => trim(intval($this->uriseg->id))));// update@Meta
						if($update) $this->_Session->setFB_Pozitive(array("ref" => "Metadata Serviciu", "text" => "Modificarile tale au fost salvate!"));
						redirect($viewdata["form"]->item->segments);
					}
				endif;
      break;

      case INSERT:
				/* form @item */
				$redirect = $this->controller_fake;
        if(isset($_REQUEST["{$form_submititem}"])) {
					!empty($this->input->post("{$viewdata["form"]->item->prefix}item_name")) ? $http_id = convert_accented_characters(str_replace(" ", "_", trim(strtolower($this->input->post("{$viewdata["form"]->item->prefix}item_name"))))) : $http_id = false;
				
					$newDBPattern = (object) [ // Design Database Pattern
						"table" => $this->ControllerObject->obj_table,
						"database" => INSERT,
						"type" => PUT,
						"design" => array(
							"item_name" => true,
							"id_object" => $this->ControllerObject->id_object,
							"http_id" => $http_id
						)
					]; 
					$insert = $this->_Item->INSItem($newDBPattern->table, $viewdata["form"]->item->prefix, $newDBPattern);// insert@Item
					
					if($insert) {
						$this->_Session->setFB_Pozitive(array("ref" => "Camere", "text" => "Ai adaugat o Camera noua!"));
						$redirect = $this->controller_fake. "/item/u/id/". $insert; 
					}
					redirect($redirect);
        }
      break;
			
			case DELETE:
				if(isset($this->uriseg->id) && !is_null($this->uriseg->id)):
					$deletecontentitems = $this->_Object->DeleteContentByItem($this->ControllerObject->id_object, trim(intval($this->uriseg->id)));
					
					$deleteitem = $this->_Item->msqlDelete($this->ControllerObject->obj_table, array("id_item" => trim(intval($this->uriseg->id))));
					
					if($deleteitem) {
						$this->_Session->setFB_Pozitive(array("ref" => "Camere", "text" => "Ai sters o Camera!"));
						redirect($this->controller_fake);
					}

				endif;
			break;
   }	
	
		
		//breacrumb
		$breadcrumb = array("bb_titlu" => "Camere", "bb_button" => null, "breadcrumb" => array());
		
		$breadcrumb["breadcrumb"][0] = array("text" => "Camere", "url" => $this->controller_fake);
		$breadcrumb["breadcrumb"][1] = array("text" => "Camera", "url" => null);
    $view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "layout/breadcrumb", "viewdata" => $breadcrumb],
      1 => (object) ["viewhtml" => "camere/item", "viewdata" => $viewdata]
      ), 'javascript' => array(
      1 => (object) ["viewhtml" => "camere/js_item", "viewdata" => null],
      )
    ];
    $this->frontend->render($view);	
	}
	
	/**
	 * [Ajax description]
	 */
  public function Ajax()
	{
		
		if(!empty($this->uriseg->ajax) && isset($this->uriseg->id) && !is_null($this->uriseg->id))
	    switch($this->uriseg->ajax)
			{
				case LINKREQUEST:
					$res = array("status" => 0);
					
					$params = !empty($this->input->post("params")) ? $this->input->post("params") : null;
					foreach($params as $paramaction => $param) {
						$paction = $paramaction;
						$pparam = $param;
					}
					
					if($paction == "selected")
						$actdb = $this->_Object->InsertContent($this->ControllerObject->id_object, $this->uriseg->id, $pparam);
					elseif($paction == "deselected")
						$actdb = $this->_Object->DeleteContent($this->ControllerObject->id_object, $this->uriseg->id, $pparam);

					if($actdb) $res["status"] = 1;
					
					header("Content-Type: application/json");
					echo json_encode($res);
				break;
				
				case UPLOADIMG:
					$res = array("status" => 0, "id" => null);
					$inputfile = "inpfile";
					$filetarget = trim($this->input->post("filetarget"));//@banner@poza
					$fileref = trim($this->input->post("fileref"));//@banner1@banner2
					
					$pagestruct = $this->_Pagini->getStructure("array", 3);//getpagestructure
					$locations = (object) ["table" => null, "path" => null];
					$imaginaryfolder = null;//usetrueformultiplefiles[s,m,l]
					$filesdata = null;
					$insertdata = null;
					switch($this->input->post("filetarget"))
					{
						case UPIMGPOZA:
							$locations->table = $this->ControllerObject->obj_table_img;
							$locations->path = '../web/' .PATH_IMG_CAMERE;
							$imaginaryfolder = array("s" => true, "m" => true, "l" => true);
							
							$filesdata = array(
								"s" => array("w" => null, "h" => null, "p" => null),
								"m" => array("w" => null, "h" => null, "p" => null),
								"l" => array("w" => null, "h" => null, "p" => null)
							);
							foreach($filesdata as $kd => $d) {
								foreach($d as $kdd => $dd) {
									$db_format = "image_" .$kd.$kdd;//databasecolumn
									$filesdata[$kd][$kdd] = !is_null($pagestruct[$db_format]) ? $pagestruct[$db_format] : json_decode(constant("IMG_SIZE_" .strtoupper($kd)), true)[$kdd];
									
									if($kdd == "p")
										$filesdata[$kd][$kdd] = $pagestruct[$db_format] == "1" ? true : json_decode(constant("IMG_SIZE_" .strtoupper($kd)), true)[$kdd];
								}
							}
						break;
					}
					if(!is_null($filesdata)) {
						$upimgs = $this->_Upload->uploadImage($locations->path, $filesdata, $imaginaryfolder);//uploadimages
						if($upimgs["img"]) {
							$res["status"] = 1;
							$res["img"] = $upimgs["img"];
							
							$insertdata = array("id_item" => trim(intval($this->uriseg->id)), "img" => $upimgs["img"], "img_ref" => $fileref);
							if(!is_null($imaginaryfolder))
								foreach($imaginaryfolder as $kifolder => $ifolder) $insertdata[$kifolder] = $ifolder;//pushimaginaryfoldertoinsertdata
							
							$insertitem = $this->_Item->msqlInsert($locations->table, $insertdata);
							if($insertitem) $res["id"] = $insertitem;
						}
					}
					
					header("Content-Type: application/json");
					echo json_encode($res);
				break;

				case DELETE:
					$res = array("status" => 0);

					$fileid = trim($this->input->post("fileid"));
					$fileref = trim($this->input->post("fileref"));// reference could be "banner1" for "banner"
					
					$locations = (object) ["table" => null, "path" => null];
					$imaginaryfolder = null;//usetrueformultiplefiles[s,m,l]
					
					//remove Poza
					if(strstr($fileref, "poza")) {
						$locations->path = '../web/' .PATH_IMG_CAMERE;
						$locations->table = $this->ControllerObject->obj_table_img;
						$imaginaryfolder = array("s" => true, "m" => true, "l" => true);
					}
					
					$deleteitem = $this->_Item->RetrieveAndRemove($locations->table, array("id" => intval(trim($fileid)), "id_item" => intval(trim($this->uriseg->id))));
					if($deleteitem) {
						deletefile('../web/' .$locations->path, $deleteitem->img, $imaginaryfolder);

						$res["status"] = 1;
					}					
					echo json_encode($res);
				break;
				
				
				case PLAN_INTERVALE:
				
					$res = array("status" => 0);
				
					$date_start = !empty($this->input->post("date_start")) ? date_format(date_create($this->input->post("date_start")), 'Y-m-d') : null;
					$date_end   = !empty($this->input->post("date_end")) ? date_format(date_create($this->input->post("date_end")), 'Y-m-d') : null;
					$pret       = !empty($this->input->post("pret")) ? $this->input->post("pret") : null;
					$plan_id    = !empty($this->input->post("plan_id")) ? $this->input->post("plan_id") : null;
					$plan_act   = !empty($this->input->post("plan_act")) ? $this->input->post("plan_act") : null;
					
					$data = array(
						"id_item"      => $plan_id,
						"date_start"   => $date_start,
						"date_end"     => $date_end,
						"date_startux" => strtotime($date_start),
						"date_endux"   => strtotime($date_end),
						"pret"         => $pret
					);
					
					// var_export($data);die();
					
					$insert = $this->_Item->msqlInsert('camere_intervale', $data);
					if($insert) {
						$res["status"] = 1;
					}
					
					header("Content-Type: application/json");
					echo json_encode($res);
				break;
				
				
				case LOAD_INTERVALE:
					
					$res = array("status" => 0, "items" => null);
					
					$postdata = !empty($this->input->post("postdata")) ? $this->input->post("postdata") : null;
					// var_export($postdata);die();
					
					if(!is_null($postdata)) {
						
						$items = array();
						$date_today = strtotime(date("Y-m-d"));
						
						foreach($postdata as $item) {
							
							$getintervale = $this->_Item->msqlGetAll('camere_intervale', array("id_item" => $item));
							if($getintervale) {
								$html = '<h3 style="text-align:center;">Lista planificari</h3>';
								$html .= '<table class="table" style="border-top:2px solid orange;font-size:15px;">';
								$html .= '<thead>
								<tr>
								<th>Publica in Oferte</th>
								<th>De la data</th>
								<th>Pana la data</th>
								<th>Pret(/zi)</th>
								<th>Activitate</th>
								<th></th>
								<th></th>
								</tr>
								</thead>';
								$html .= "<tbody>";
								
								foreach($getintervale as $interval) {
									$html .= "<tr>";
									$html .= '<td>
									<div class="switch">
										<div class="onoffswitch">
												<input type="checkbox" class="onoffswitch-checkbox dispofftog" id="dispoff_' .$interval->id_interval. '" ' .($interval->displayoferta ? "checked" : ""). '>
												<label class="onoffswitch-label" for="dispoff_' .$interval->id_interval. '">
														<span class="onoffswitch-inner"></span>
														<span class="onoffswitch-switch"></span>
												</label>
										</div>
									</div>
									';
									$html .= '<td>' .date_format(date_create($interval->date_start), 'd-m-Y'). '</td>';
									$html .= '<td>' .date_format(date_create($interval->date_end), 'd-m-Y'). '</td>';
									$html .= '<td>' .$interval->pret. ' RON</td>';
									$html .= '
									<td>
										' .($date_today > strtotime(date_format(date_create($interval->date_end), 'Y-m-d')) ? '<strong style="color:red;">Sfarsit</strong>' : '<strong style="color:green;">In desfasurare</strong>'). '
									</td>
									</td>';
									$html.='<td>
									<button class="btn btn-info" data-toggle="modal" data-target="#edit_camera" title="Editare Planificare" onClick="return get_interval_by_id(' .$interval->id_interval. ');"><i class="fa fa-pencil"></i> Editare</button>
									</td>';
									$html .= '<td>
									<button class="btn btn-danger btn-xs ahrefaskconfirm" title="Sterge interval" onClick="return deleteInterval(' .$item. ', \'delete\', ' .$interval->id_interval. ');"><i class="fa fa-trash-o"></i> Sterge</button>									
									</td>';
									$html .= "</tr>";
								}
								
								$html .= "</tbody>";
								$html .= "</table>";
								
								$title = null;
								$cintervale = count($getintervale);
								
								switch($cintervale)
								{
									default: $title = '<i class="fa fa-calendar"></i> ' .$cintervale. " Planificari"; break;
									case 0: $title = '<i class="fa fa-calendar"></i> Nu exista planificari'; break;
									case 1: $title = '<i class="fa fa-calendar"></i> 1 Planificare'; break;
								}
								$items[$item] = array("html" => $html, "title" => $title);
							} else
								$items[$item] = array("html" => '<h3><span class="font-normal">Nu exista planificari pentru aceasta camera. </span></h3>', "title" => "Nu exista planificari");
						}
						
						if(!empty($items)) {
							
							$res["status"] = 1;
							$res["items"] = $items;
						}
					}
					
					header("Content-Type: application/json");
					echo json_encode($res);
				break;

				case GET_INTERVAL_BY_ID:
					$res = array("status" => 0);
					$data = array(
						"pret" => 222
					);
					
					$id_interval = intval($this->uriseg->id);
					if($id_interval) {
						$getinterval= $this->_Item->msqlGetAll('camere_intervale', array("id_interval" => $id_interval));
						if($getinterval){
							$res["status"] = 1;
							$res["output"] = $getinterval[0];
						}
					}

					header("Content-Type: application/json");
					echo json_encode($res);
				
				break;

				case EDIT_INTERVAL:
					$res = array("status" => 0);
					$data = array(
						"pret" => 222
					);
					
					$id_interval = intval($this->uriseg->id);
					if($id_interval) {
						$update = $this->_Item->msqlUpdate('camere_intervale',$data, array("c" => "id_interval", "v" => $id_interval));
						if($update)
							$res["status"] = 1;
					}

					header("Content-Type: application/json");
					echo json_encode($res);
				break;	

				case DELETE_INTERVAL:
					
					$res = array("status" => 0);
					
					$id_interval = intval($this->uriseg->id);
					if($id_interval) {
						$delete = $this->_Item->msqlDelete('camere_intervale', array('id_interval' => $id_interval));
						if($delete)
							$res["status"] = 1;
					}
					
					header("Content-Type: application/json");
					echo json_encode($res);
				break;
				
				case OFFERS_TOGGLE:
					$id_interval = intval(preg_replace("/[^0-9\.]/", '', $this->uriseg->id));
					
					echo json_encode($this->_Item->QuestionTrueFalse('camere_intervale', 'displayoferta', array("column" => "id_interval", "value" => $id_interval)));
					
					// var_dump($id_interval);
				break;
				
				case UPDATE_OFFER:
					
					$res = array("status" => 0);
					
					$id_item = intval($this->uriseg->id);
				
					$offer_titlu = !empty($this->input->post("offer_titlu")) ? $this->input->post("offer_titlu") : null;
					$offer_content   = !empty($this->input->post("offer_content")) ? $this->input->post("offer_content") : null;
					
					$data = array(
						"offer_titlu" => $offer_titlu,
						"offer_content" => $offer_content
					);
					
					
					$update = $this->_Item->msqlUpdate('camere', $data, array("c" => "id_item", "v" => $id_item));

						$res["status"] = 1;

					
					header("Content-Type: application/json");
					echo json_encode($res);					

				break;
			}
		else show_404();
  }
}
