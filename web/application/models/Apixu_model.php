<?php
class Apixu_model extends CI_Model {
	
	private $url;
	private $api_key = 'a761325900224a75915180938170811';


  public function __construct()
  {
		
    parent::__construct();
    // Your own constructor code
		
		$this->url = 'http://api.apixu.com/v1/current.json?key=' .$this->api_key. '&q=';
  }

	
  /**
   * [getWeather description]
	 *
   */
  public function getWeather($param = "eforie nord")
  {
		
		$url = $this->url. urlencode($param);
		
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
		// curl_setopt($ch, CURLOPT_VERBOSE, 1);
		// curl_setopt($ch, CURLOPT_HEADER, 0);
    
    $json_output = curl_exec($ch);
    $weather = json_decode($json_output);
		
		if(isset($weather->location->name)) {
			
			$res = (object) [
				'location_name' => $weather->location->name,
				'temp_c' => null,
				'temp_f' => null,
				'icon' => null
			];
			
			
			if(isset($weather->current->temp_c))
				$res->temp_c = $weather->current->temp_c;
			if(isset($weather->current->temp_f))
				$res->temp_f = $weather->current->temp_f;
			if(isset($weather->current->condition->icon))
				$res->icon = 'http://' .$weather->current->condition->icon;
			
			return $res;
		}
		
		
		return false;
  }
}
