<?php
class Frontend_model extends CI_Model {

  private $owner, $company;

  private $tbl_owner = TBL_OWNER;
  private $tbl_company = TBL_COMPANY;
  private $tbl_users = TBL_USERS;
  private $tbl_pages = TBL_PAGES;
	private $tbl_pages_structure = TBL_PAGES_STRUCTURE;

  public function __construct()
  {
  	parent::__construct();
  	// Your own constructor code

  }

  public function getOwner() {
		$query = $this->db->query("SELECT * FROM `" .$this->tbl_owner. "`;");

		if($query->num_rows() > 0) {
      $this->owner = $query->row();
      return $this->owner;
    }
		else return false;
  }

  public function getCompany() {
    $query = $this->db->query("SELECT * FROM `" .$this->tbl_company. "` WHERE idowner = " .$this->owner->id. ";");

    if($query->num_rows() > 0) {
      $this->owner = $query->row();
      return $this->owner;
    }
    else return false;
  }

  /**
   * [listPages description]
   * @param  boolean $is_active [description]
   * @return [type]             [description]
   */
  public function listPages($is_active) {
    $query = $this->db->query("
		SELECT {$this->tbl_pages}.id, {$this->tbl_pages}.id_page, {$this->tbl_pages_structure}.is_active, {$this->tbl_pages}.title, {$this->tbl_pages}.title_ro, {$this->tbl_pages}.title_browser_ro FROM `" .$this->tbl_pages. "`
		LEFT JOIN `{$this->tbl_pages_structure}` ON {$this->tbl_pages_structure}.idpage = {$this->tbl_pages}.id
		WHERE {$this->tbl_pages_structure}.is_active = " .$is_active. ";");

    if($query->num_rows() > 0) {
      return $query->result();
    }
    else return false;
  }
	
  
  public function getUserEmail() {
    
    $query = $this->db->query("SELECT id, user_name, email FROM `" .$this->tbl_users. "` WHERE id = 2;");
    
    if($query->num_rows() > 0) {
      $this->owner = $query->row();
      return $this->owner;
    }
    else return false;
  }
}
