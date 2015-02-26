<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ModelProductos extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function addProducto($data)
	{
		$query=$this->db->insert('productos',$data);
		return $query;
	}
}
?>