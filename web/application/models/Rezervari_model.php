<?php
class Rezervari_model extends CI_Model {

  private $tbl_camere;
	private $tbl_camere_intervale;


  public function __construct()
  {
    $this->tbl_camere = TBL_CAMERE;
		$this->tbl_camere_intervale = TBL_CAMERE_INTERVALE;

    parent::__construct();
    // Your own constructor code
  }

	
  /**
   * [getCamereByIntervale description]
	 *
   */
  public function getCamereByIntervale($interv_a, $interv_b)
  {
		
		$date_start = strtotime($interv_a);
		$date_end = strtotime($interv_b);
		
		$date_today = strtotime(date("Y-m-d"));
		
		if($date_start < $date_today)
			return false;
		// var_dump($date_today);die();
		// if($date_today)

		$sql = "
			SELECT {$this->tbl_camere_intervale}.id_interval, {$this->tbl_camere_intervale}.id_item, {$this->tbl_camere_intervale}.date_start, {$this->tbl_camere_intervale}.date_end, {$this->tbl_camere_intervale}.pret,
			{$this->tbl_camere}.item_name, {$this->tbl_camere}.titlu_prezentare, {$this->tbl_camere}.http_id
			FROM `{$this->tbl_camere_intervale}`
			LEFT JOIN `{$this->tbl_camere}` ON {$this->tbl_camere}.id_item = {$this->tbl_camere_intervale}.id_item
			WHERE ({$date_end} >= date_startux AND {$date_start} <= date_endux)
			AND ({$date_end} <= date_endux AND {$date_start} >= date_startux)
		";

		
    $query = $this->db->query($sql);

    if($query->num_rows() > 0) {
      return $query->result();
    }
    else return false;
  }
	
	public function getOferte()
	{
		
		$date_today = strtotime(date("Y-m-d") ." 00:00:00");
		
		// var_dump($date_today);die();
		// if($date_today)

		$sql = "
			SELECT {$this->tbl_camere_intervale}.id_interval, {$this->tbl_camere_intervale}.id_item, {$this->tbl_camere_intervale}.date_start, {$this->tbl_camere_intervale}.date_end, {$this->tbl_camere_intervale}.pret,
			{$this->tbl_camere}.item_name, {$this->tbl_camere}.titlu_prezentare, {$this->tbl_camere}.http_id, {$this->tbl_camere}.offer_titlu, {$this->tbl_camere}.offer_content
			FROM `{$this->tbl_camere_intervale}`
			LEFT JOIN `{$this->tbl_camere}` ON {$this->tbl_camere}.id_item = {$this->tbl_camere_intervale}.id_item
			WHERE {$this->tbl_camere_intervale}.displayoferta = 1
			AND date_endux >= {$date_today};
		";
		
		// var_dump($sql);die();

		
    $query = $this->db->query($sql);

    if($query->num_rows() > 0) {
      return $query->result();
    }
    else return false;		
	}
	
	/**
	 * assocBy
	 *
	 */
	public function assocBy($key, $data)
	{
		
		$res = array();
		
		foreach($data as $d) {
			
			$res[$d->{$key}] = $d;
		}
		
		return $res;
	}
	
  /**
   * [msqlInsert description]
   * @param  [type] $table [description]
   * @param  [type] $data  [description]
   * @return [boolean]     [description]
   */
  public function msqlInsert($table, $data)
  {
		
    $insert = $this->db->insert($table, $data);
    if($insert) return $this->db->insert_id();
    else return false;
  }
	
	public function GetRezervare($id_rezervare)
	{
		
		$rezervare = $this->msqlGet('camere_rezervari', array("id_rezervare" => $id_rezervare));
		if($rezervare) {
			
			$rezervare->camera = $this->msqlGet('camere', array("id_item" => $rezervare->id_item));
			
			return $rezervare;
		}

		return false;
	}
	
  /**
   * [msqlGet description]
   * @param  [type] $table [description]
   * @param  [type] $data  [description]
   * @return [type]        [description]
   */
  public function msqlGet($table, $data)
	{
		foreach($data as $keyd => $d)
			$this->db->where($keyd, $d);
    $query = $this->db->get($table);

    if($query->num_rows() > 0) return $query->row();
    return false;
	}
	
}
