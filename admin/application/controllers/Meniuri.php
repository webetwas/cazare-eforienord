<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meniuri extends CI_Controller {

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
		
		$this->controller_fake = $this->controller;//Here we don't need an Fake controller, there are no Father Controller
    $this->controller_ajax = $this->controller;
		$this->uriseg = json_decode(json_encode($this->uri->uri_to_assoc(2)));

    if(!$this->user->id) redirect("login");
		
    $this->load->model("Item_model", "_Item");// model/_Item
		$this->load->model("Chain_model", "_Chain");// model/_Chain
		$this->load->model("Object_model", "_Object");// model/_Categories
		
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
		
		$viewdata = array("items" => null, "controller_fake" => $this->controller_fake, "controller_ajax" => $this->controller_fake. "/ajax/", "uri" => null);
		$viewdata["uri"] = $this->uriseg;
		
		$items = $this->_Item->msqlGetAll($this->ControllerObject->obj_table);
		if($items) $viewdata["items"] = $items;
		
		//breacrumb
		$breadcrumb = array("bb_titlu" => "Meniuri", "bb_button" => null, "breadcrumb" => array());
		$breadcrumb["bb_button"] = array("text" => '<i class="fa fa-plus-square"></i> Adauga meniu', "linkhref" => $this->controller_fake ."/item/i");
		
		$breadcrumb["breadcrumb"][0] = array("text" => "Administrare", "url" => '');
		$breadcrumb["breadcrumb"][1] = array("text" => "Meniuri", "url" => null);
    $view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "layout/breadcrumb", "viewdata" => $breadcrumb],
      1 => (object) ["viewhtml" => "meniuri/index", "viewdata" => $viewdata]
      ), 'javascript' => array(
      1 => (object) ["viewhtml" => "meniuri/js_index", "viewdata" => null],
      )
    ];
    $this->frontend->render($view);
  }	
	
	/**
	 * Item
	 */
	public function item()
	{
		
		$viewdata = array("controller" => $this->controller, "controller_fake" => $this->controller_fake, "controller_ajax" => $this->controller_fake. "/ajax/", "item" => null, "item_links" => null, "links" => null, "uri" => null, "form" => (object) []);
		$viewdata["uri"] = $this->uriseg;
		// var_dump($this->uriseg);
	
		// FORM - NEW Item - Page
		$viewdata["form"]->item = (object) ["name" => "item", "prefix" => "it", "segments" => $this->controller_fake. "/item/" .$this->uriseg->item. ($this->uriseg->item == "u" && isset($this->uriseg->id) && !is_null($this->uriseg->id) ? "/id/" .trim(intval($this->uriseg->id)) : "")];
		$form_submititem = $viewdata["form"]->item->prefix. "submit";//submit<button>	
    switch($this->uriseg->item)
    {
      case UPDATE:
				if(isset($this->uriseg->id) && !is_null($this->uriseg->id)):
					$links = $this->_Chain->getAllLinks();
					$links ? $viewdata["links"] = $links : $viewdata["links"] = null;				
				
					$item = $this->_Item->msqlGet($this->ControllerObject->obj_table, array("id_item" => trim(intval($this->uriseg->id))));
					if($item) $viewdata["item"] = $item;
					
					$item_links = $this->_Chain->getIIDS_LinksByAnObjectItem($this->ControllerObject->id_object, trim(intval($this->uriseg->id)));
					if($item_links) $viewdata["item_links"] = $item_links;
					
					/* form @item */
					if(isset($_REQUEST["{$form_submititem}"])) {

						$newDBPattern = (object) [ // Design Database Pattern
							"table" => $this->ControllerObject->obj_table,
							"database" => UPDATE,
							"type" => GET,
							"design" => array(
								'item_isactive' => false,
								'item_parent_fake' => false,
								'item_key' => false
							)
						]; 
						$update = $this->_Item->UPItem($newDBPattern->table, $viewdata["form"]->item->prefix, $newDBPattern, array("c" => "id_item", "v" => trim(intval($this->uriseg->id))));// update@Item
						if($update) $this->_Session->setFB_Pozitive(array("ref" => $item->item_name, "text" => "Modificarile tale au fost salvate!"));
						redirect($viewdata["form"]->item->segments);
					}
				endif;
      break;

      case INSERT:
				/* form @item */
				$redirect = $this->controller_fake;
        if(isset($_REQUEST["{$form_submititem}"])) {

					$newDBPattern = (object) [ // Design Database Pattern
						"table" => $this->ControllerObject->obj_table,
						"database" => INSERT,
						"type" => GET,
						"design" => array(
							"id_object" => $this->ControllerObject->id_object
						)
					]; 
					$insert = $this->_Item->INSItem($newDBPattern->table, $viewdata["form"]->item->prefix, $newDBPattern);// insert@Item
					
					if($insert) {
						$this->_Session->setFB_Pozitive(array("ref" => "Meniuri", "text" => "Ai creat un Meniu nou!"));
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
						$this->_Session->setFB_Pozitive(array("ref" => "Meniuri", "text" => "Ai sters un Meniu!"));
						redirect($this->controller_fake);
					}

				endif;
			die();
   }	
	
		
		//breacrumb
		$breadcrumb = array("bb_titlu" => "Meniuri", "bb_button" => null, "breadcrumb" => array());
		
		$breadcrumb["breadcrumb"][0] = array("text" => "Meniuri", "url" => $this->controller_fake);
		$breadcrumb["breadcrumb"][1] = array("text" => "Meniu dd", "url" => null);
    $view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "layout/breadcrumb", "viewdata" => $breadcrumb],
      1 => (object) ["viewhtml" => "meniuri/item", "viewdata" => $viewdata]
      ), 'javascript' => array(
      1 => (object) ["viewhtml" => "meniuri/js_item", "viewdata" => null],
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
				
				case AJXTOGGLE:
					$column = false;
					$id = false;
					$xplodeid = explode("_", trim($this->uriseg->id));
					if(isset($xplodeid[0]) && $xplodeid[0] == "a") $column = "item_parent_fake";
					elseif(isset($xplodeid[0]) && $xplodeid[0] == "b") $column = "item_isactive";
					if(isset($xplodeid[1])) $id = $xplodeid[1];
					
					echo json_encode($this->_Item->QuestionTrueFalse($this->ControllerObject->obj_table, $column, array("column" => "id_item", "value" => $id)));
				
					// if(!empty($this->input->post("postdata")))
						// echo json_encode($this->_Ajax->ToggleTT($table, $this->input->post("postdata")));
				break;
			}
		else show_404();
  }
}
