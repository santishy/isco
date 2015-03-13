<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ModelHome extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getSlider(){
		$this->db->where("slider",true);
		$query = $this->db->get('servicios');
		return $query;

	}

	function getSlide($id){
		$this->db->where("id_slider",$id);
		$this->db->where("slider",true);
		$query = $this->db->get('servicios');
		return $query;
	}

}
?>