<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Afiseazafisiere extends CI_Controller {
  /**
	 * [private Controller]
	 * @var [type]
	 */
	private $controller;


	public function __construct() {
		parent::__construct();
		// Your own constructor code

    $this->controller = $this->router->fetch_class();//Controller
		
		// $this->load->model("Fisiere_model", "_Fisiere"); // model/_Fisiere
		// $this->load->model("Comenzi_model", "_Comenzi"); // model/_Comenzi
		$this->load->model("Frontend_model", "_Frontend"); // model/_Secure
		$this->load->model("Rezervari_model", "_Rezervari"); // model/_Secure
	}

  public function index()
  {
		exit(show_404());
	}
	
	public function confirmare_rezervare($id_rezervare, $uniqueid, $type = "pdf")
	{
		
		if(empty($id_rezervare) || empty($uniqueid)) exit(show_404());


		$applicationdata = $this->_Frontend->getOwner();
		$rezervare = $this->_Rezervari->GetRezervare(trim(intval($id_rezervare)));
		if(!$rezervare) exit(show_404());
		
		$data_forhtml = array("app" => $applicationdata, "rezervare" => $rezervare);
		
		$html = $this->load->view("blocuri/rezervare_pdf", $data_forhtml, true);
		
		// var_dump($rezervare);die();
		
		// $html = $this->_Fisiere->factura($applicationdata, $client, $comanda);
		
		
		if(trim(strtolower($type)) == "html") {
			exit($html);
		}
		elseif(trim(strtolower($type)) == "pdf") {
			include_once("../mpdf60/mpdf.php");
			
			$mpdf=new mPDF(); 
			$mpdf->WriteHTML($html);
			$mpdf->Output();			
		}
	}
}
