<?php
class Frontend {
	protected $CI;
	protected $_Frontend;

	/**
	 * [ Frontend - Layout ]
	 *
	 * @var [String] @header
	 * @var [String] @head - Including FrontendData
	 * @var [String] @footer
	 * @var [String] @footer_end
	 *
	 * @var [String] @body
	 * @var [String] @body_end
	 */
	 private $header = true, $head = true, $top = true, $footer = true, $footer_end = true;
	 private $body = true, $body_end = true;
	 
	 public $slider = false;
	 public $rezervari_simple = false;
	 
	 public $user_name = null;

	 /**
	  * [ Frontend - Data ]
	  *
	  * @var [Object] @owner
	  * @var [Object] @company
	  * @var [Object] @pageslist
	  */
	 public $owner = null, $company = null;
	 
	 public $menus = null;
	 public $menus_footer = null;
	 
	 public $camere = null;
	 
	 public $weather = false;
	 
	 public $date_today;
	 
	 public $desprenoi_small;

	/**
	 * [__construct]
	 *
	 * We'll use a constructor, as you can't directly call a function
	 * from a property definition.
	 */
	public function __construct()
	{
		
		// exit();
		// Exit
		
		
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();

		$this->CI->load->model("Frontend_model", "_Frontend");
		$this->CI->load->model("Object_model", "_Object");
		$this->CI->load->model("Apixu_model", "_Apixu");
		
		$this->CI->load->helper('tiny_helper');

		$this->owner = $this->CI->_Frontend->getOwner();
		$this->company = $this->CI->_Frontend->getCompany();
		
		$this->menus = $this->CI->_Object->getMenus("meniuri", "7f9a54582705ec3db12382266d6cdb34");
		$this->menus_footer = $this->CI->_Object->getContentItemsFull("meniuri", "23a7cdf313fd074165304e89056ae895");
		$this->camere = $this->CI->_Object->getContentItemsFull("camere", "b6e7800cbe1e30a31188dbd6c384d3ee");
		
		// $this->weather = $this->CI->_Apixu->getWeather("eforie nord"); // Weather
		$this->date_today = '<strong>' .getRoByDay(date("l")). '</strong>, ' .date("j"). ' ' .getRoByMonth(date("F")); // Date Today
		
		$this->desprenoi_small = substr($this->CI->_Object->msqlGet('fe_pages', array("id_page" => "despre_noi"))->content_ro, 0, 500). '...';
		
		$this->user_name = $this->CI->_Frontend->getUserEmail();
	}

	/**
	 * [render description]
	 * @param  [type] $data      [description]
	 * @param  [type] $headparam [description]
	 * @return [type]            [description]
	 */
	public function render($data, $data_header = null) {
		$fDATA = array("owner" => null, "company" => null, "camere" => null, "date_today" => $this->date_today, "desprenoi_small" => $this->desprenoi_small);
		$fDATA["owner"] = $this->owner;
		$fDATA["company"] = $this->company;
		$fDATA["camere"] = $this->camere;
		// var_dump($fDATA);die();
		
		$menusDATA = array("menus" => null);
		if($this->menus) $menusDATA["menus"] = $this->menus;
		
		$menusFOOTER = array("menus_footer" => null);
		if($this->menus_footer) $menusFOOTER["menus_footer"] = $this->menus_footer;
		
		$topDATA = array("weather" => null);
		if($this->weather) $topDATA["weather"] = $this->weather;
		
		// var_dump($this->weather);die();

		if(empty($data)) { echo "empty data on render";die(); }

		if($this->header) $this->CI->load->view('_layout/header', (!is_null($data_header) ? $data_header : null));
		if($this->body) $this->CI->load->view('layout/body');
		if($this->head) $this->CI->load->view('layout/head', (!empty($fDATA) ? $fDATA : null));
		if($this->top) $this->CI->load->view('layout/top_start');
		if($this->top) $this->CI->load->view('layout/top_first' , (!empty($topDATA) ? $topDATA : null));
		if($this->top) $this->CI->load->view('layout/top_second_menus', (!empty($menusDATA) ? $menusDATA : null));
		if($this->top) $this->CI->load->view('layout/top_end');
		
		foreach($data->html as $keyh => $h)//content
			if(!is_null($h))
				if(!is_null($h->viewdata)) {
					$this->CI->load->view($h->viewhtml, $h->viewdata);
				}
				else
					$this->CI->load->view($h->viewhtml);
		if($this->footer) $this->CI->load->view('layout/footer', (!empty($menusFOOTER) ? $menusFOOTER : null));
		if($this->footer) $this->CI->load->view('_layout/footer');
		if(!empty($data->javascript))
			foreach($data->javascript as $keyj => $j)
				if(!is_null($j->viewdata))
					$this->CI->load->view($j->viewhtml, $j->viewdata);
				else
					$this->CI->load->view($j->viewhtml);
		if($this->body_end) $this->CI->load->view('layout/body_end');
		if($this->footer) $this->CI->load->view('_layout/footer_end');
	}
}
