<?php
class Sendemail_model extends CI_Model {
  private $from_address;
  private $from_name;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code

    $this->load->library('email');

    $this->from_address = "no-reply@recukinetic.ro";
    $this->from_name = "Cazare EforieNord";
  }
  
  /**
   * newRezervare
   *
   */
  public function newRezervare($contact_data, $to)
  {
   
   $message = " Rezervare noua inregistrata, prin intermediul Cazare-eforienord.com.ro - Serviciul de rezervari<br/><br/><br/>
    Nume: {$contact_data["numeprenume"]}, <br />
		Telefon: {$contact_data["telefon"]}, <br />
    Email: {$contact_data["email"]}, <br /><br />
    Adulti: {$contact_data["adulti"]}, <br /><br />
    Copii: {$contact_data["copii"]}, <br /><br />
    Numar camere: {$contact_data["nrcamere"]}, <br /><br />
    CHECK-IN: {$contact_data["d_start"]}, <br /><br />
    CHECK-OUT: {$contact_data["d_end"]}, <br /><br />
    Rezervare facuta in data de: {$contact_data["created_at"]}, <br /><br />
		
   ";
   
    $this->send($to, 'Cazare-eforienord.com.ro - Rezervare noua', $message, 'HTML');
  }  
  
  public function send($to, $subj, $mess, $type)
  {
    $type = strtoupper($type);
    $config['protocol']  = 'smtp';
		
    $config['smtp_host'] = 'mail.cazare-eforienord.com';
    $config['smtp_port'] = '587'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
    // $config['smtp_crypto'] = 'tls';
    $config['smtp_user'] = 'rezervari@cazare-eforienord.com';
    $config['smtp_pass'] = 'iO6bN*ENBp@g';
    
    // contact
    // _n~Cf09Tk~B%

    $config['charset']   = 'utf-8';
    $config['newline']   = "\r\n";
    $config['send_multipart'] = FALSE;
    
		if ($type == 'HTML') {
			$config['mailtype'] = "html";
			$config['wordwrap']  = TRUE;
		}
		else $config['mailtype'] = "text";


		$this->email->initialize($config);
		$this->email->from($this->from_address, $this->from_name);
		$this->email->to($to);
		$this->email->subject($subj);
		$this->email->message($mess);

		$send = $this->email->send();
		if(!$send) {
			echo $this->email->print_debugger();
		}
  }
}