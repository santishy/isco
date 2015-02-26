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
	function maxId()
	{
		$query=$this->db->query('select max(id_producto) as id_producto from productos');
		return $query;
	}
	function addImgProd($data)
	{
		$query=$this->db->insert('imagenes',$data);
		return $query;
	}
	function validarProd($data)
	{
		$query=$this->db->query('(select * from productos where nombreprod="'.$data['nombreprod'].'" and descripcion="'.$data['descripcion'].'" and id_categoria='.$data['id_categoria'].')');
		return $query;
	}
}
?>