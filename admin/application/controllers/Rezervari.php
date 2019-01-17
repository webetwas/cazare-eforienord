<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rezervari extends CI_Controller {


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
		
		$items = $this->_Item->msqlGetAll('camere_rezervari');
		if($items) $viewdata["items"] = $items;
		
		//breacrumb
		$breadcrumb = array("bb_titlu" => "Rezervari camere", "bb_button" => null, "breadcrumb" => array());
		
		$breadcrumb["breadcrumb"][0] = array("text" => "Administrare", "url" => '');
		$breadcrumb["breadcrumb"][1] = array("text" => "Rezervari", "url" => null);
    $view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "layout/breadcrumb", "viewdata" => $breadcrumb],
      1 => (object) ["viewhtml" => "rezervari/index", "viewdata" => $viewdata]
      ), 'javascript' => array(
      1 => (object) ["viewhtml" => "rezervari/js_index", "viewdata" => null],
      )
    ];
    $this->frontend->render($view);
  }	
	
	/**
	 * Item
	 */
	public function item()
	{
		
		$viewdata = array("controller" => $this->controller, "controller_fake" => $this->controller_fake, "controller_ajax" => $this->controller_fake. "/ajax/", "item" => null, "camera" => null, "uri" => null, "form" => (object) []);
		$viewdata["uri"] = $this->uriseg;
		// var_dump($this->uriseg);
	
		// FORM - NEW Item - Page
		$viewdata["form"]->item = (object) ["name" => "item", "prefix" => "it", "segments" => $this->controller_fake. "/item/" .$this->uriseg->item. ($this->uriseg->item == "u" && isset($this->uriseg->id) && !is_null($this->uriseg->id) ? "/id/" .trim(intval($this->uriseg->id)) : "")];
		$form_submititem = $viewdata["form"]->item->prefix. "submit";//submit<button>	
    switch($this->uriseg->item)
    {
      case UPDATE:
				if(isset($this->uriseg->id) && !is_null($this->uriseg->id)):		
				
					$item = $this->_Item->msqlGet('camere_rezervari', array("id_rezervare" => trim(intval($this->uriseg->id))));
					if($item) {
						
						$camera = $this->_Item->msqlGet('camere', array("id_item" => $item->id_item));
						if($camera)
							$viewdata["camera"] = $camera;
						
						$viewdata["item"] = $item;
					
					}
					
					/* form @item */
					if(isset($_REQUEST["{$form_submititem}"])) {

						$newDBPattern = (object) [ // Design Database Pattern
							"table" => 'camere_rezervari',
							"database" => UPDATE,
							"type" => PUT,
							"design" => array(
								'status' => true
							)
						]; 
						$update = $this->_Item->UPItem($newDBPattern->table, $viewdata["form"]->item->prefix, $newDBPattern, array("c" => "id_rezervare", "v" => trim(intval($this->uriseg->id))));// update@Item
						if($update) $this->_Session->setFB_Pozitive(array("ref" => 'Cerere: ' .$item->numeprenume, "text" => "Modificarile tale au fost salvate!"));
						redirect($viewdata["form"]->item->segments);
					}
				endif;
      break;

			
			case DELETE:
				if(isset($this->uriseg->id) && !is_null($this->uriseg->id)):
					
					$deleteitem = $this->_Item->msqlDelete('camere_rezervari', array("id_rezervare" => trim(intval($this->uriseg->id))));
					
					if($deleteitem) {
						$this->_Session->setFB_Pozitive(array("ref" => "Rezervari", "text" => "Ai sters o Rezervare!"));
						redirect($this->controller_fake);
					}

				endif;
			die();
   }	
	
		
		//breacrumb
		$breadcrumb = array("bb_titlu" => "Rezervare", "bb_button" => null, "breadcrumb" => array());
		
		$breadcrumb["breadcrumb"][0] = array("text" => "Rezervari", "url" => $this->controller_fake);
		$breadcrumb["breadcrumb"][1] = array("text" => "Rezervare", "url" => null);
    $view = (object) [ 'html' => array(
			0 => (object) ["viewhtml" => "layout/breadcrumb", "viewdata" => $breadcrumb],
      1 => (object) ["viewhtml" => "rezervari/item", "viewdata" => $viewdata]
      ), 'javascript' => null
    ];
    $this->frontend->render($view);	
	}

}
