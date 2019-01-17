<?php
class Object_model extends CI_Model {
  private $objname;

	// private $tbl_chain_links = null;
	
  private $tbl_obj_objects = null;
  private $tbl_obj_content = null;
	
	public $idcontent_object = null;

  /**
   * [__construct description]
   */
  public function __construct()
  {
    parent::__construct();
    // Your own constructor code

    $this->objname = get_class($this);//Controller

		// $this->tbl_chain_links = TBL_CHAIN_LINKS;
		
    $this->tbl_obj_objects = TBL_OBJ_OBJECTS;
    $this->tbl_obj_content = TBL_OBJ_CONTENT;
  }
	
	public function getAllObjects()
	{
		return $this->msqlGetAll($this->tbl_obj_objects);
	}
	
	public function getContentItemsByIdObjectxIdLink($id_object, $id_link)
	{
		return $this->msqlGetAll($this->tbl_obj_content, array("id_object" => $id_object, "id_link" => $id_link));
	}
	
	/**
	 * updateContentItemOrder
	 */
	public function updateContentItemOrder($idcontent_object, $orderby)
	{
		
		return $this->msqlUpdate($this->tbl_obj_content, array("orderby" => $orderby), array("c" => "idcontent_object", "v" => $idcontent_object));
	}
	

	public function getObjectsXContentByIdLink($id_link)
	{
		$objects = $this->getAllObjects();
		
		if($objects) {
			foreach($objects as $keyobj => $obj) {
				$items = $this->getContentItems($obj->id_object, $id_link, $obj->obj_table);
				if($items) $objects[$keyobj]->items = $items;
			}
			
			return $objects;
		}
		
		return false;
	}
	
	private function getContentItems($id_object, $id_link, $table_items)
	{
		$sql = "SELECT {$this->tbl_obj_objects}.obj_controller, {$this->tbl_obj_objects}.obj_table, {$this->tbl_obj_objects}.obj_name,
			{$this->tbl_obj_content}.idcontent_object, {$this->tbl_obj_content}.orderby, {$this->tbl_obj_content}.id_object, {$this->tbl_obj_content}.id_item, {$this->tbl_obj_content}.id_link,
			{$table_items}.item_key, {$table_items}.item_name, {$table_items}.item_parent_fake
			FROM `{$this->tbl_obj_content}`
			LEFT JOIN `{$this->tbl_obj_objects}` ON {$this->tbl_obj_objects}.id_object = {$this->tbl_obj_content}.id_object
			LEFT JOIN `{$table_items}` ON {$table_items}.id_item = {$this->tbl_obj_content}.id_item
			WHERE {$this->tbl_obj_content}.id_object = {$id_object}
			AND {$this->tbl_obj_content}.id_link = {$id_link} ORDER BY {$this->tbl_obj_content}.orderby";
			
		$query = $this->db->query($sql);
    if($query->num_rows() > 0) return $query->result();
    
		return false;	
	}
	
	/**
	 * getObjectStructure
	 */
	public function getObjectStructure($controller)
	{
		$object = $this->msqlGet($this->tbl_obj_objects, array("obj_controller" => trim(strtolower($controller))));
		
		return $object;
	}
	
	public function InsertContent($id_object, $id_item, $id_link)
	{
		$insert = $this->msqlInsert($this->tbl_obj_content, array("id_object" => $id_object, "id_item" => $id_item, "id_link" => $id_link));
		if($insert) {
			$this->idcontent_object = $insert;
			
			return true;
		}
		
		return false;
	}
	
	public function DeleteContent($id_object, $id_item, $id_link)
	{
		$getcontent = $this->msqlGet($this->tbl_obj_content, array(
			"id_object" => $id_object,
			"id_item" => $id_item,
			"id_link" => $id_link
		));
		if($getcontent) {
			$delete = $this->msqlDelete($this->tbl_obj_content, array(
					"idcontent_object" => $getcontent->idcontent_object
				)
			);
			
			if($delete) return true;
		}
		
		return false;
	}
	
	/**
	 * DeleteItemContent
	 */
	public function DeleteContentByItem($id_object, $id_item)
	{
		return $this->msqlDelete($this->tbl_obj_content, array("id_object" => $id_object, "id_item" => $id_item));
	}
	
	public function getObjectContentByIdLink($id_link)
	{
		$content = $this->msqlGetAll($this->tbl_obj_content, array("id_link" => $id_link));
		
		return $content;
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
	
  /**
   * [msqlGetAll description]
   * @param  [type] $table [description]
   * @param  [type] $data  [description]
   * @return [type]        [description]
   */
  public function msqlGetAll($table, $data = null)
	{
		if(!is_null($data))
		foreach($data as $keyd => $d)
			$this->db->where($keyd, $d);
    $query = $this->db->get($table);

    if($query->num_rows() > 0) return $query->result();
    return false;
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
	
  /**
   * [msqlDelete description]
   * @param  [String] $table [description]
   * @param  [Array]  $data  [description]
   * @return [boolean]       [description]
   */
  public function msqlDelete($table, $data)
  {
    $this->db->delete($table, $data);

    if($this->db->affected_rows() > 0) return true;
    return false;
  }
	
  /**
   * [msqlUpdate description]
   * @param  [type] $table [description]
   * @param  [type] $data  [description]
   * @param  [type] $idarray    [description]
   * @return [boolean]     [description]
   */
  public function msqlUpdate($table, $data, $idarray)
  {
    if(empty($table)) $this->sError("Specify a table", 1);

    if(!is_array($idarray)) $this->db->where('id', intval($idarray));
		elseif(is_array($idarray)) $this->db->where($idarray["c"], intval($idarray["v"]));
    $update = $this->db->update($table, $data);

    if($update) return true;
    return false;
  }
	
}
