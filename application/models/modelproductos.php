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
	/*--------------------------------caracteristicas----------------------------------------*/
	function getCaracteristica($data)
	{
		$query=$this->db->query('select *from caracteristicas where id_producto='.$data['id_producto'].'
			and etiqueta_c="'.$data['etiqueta_c'].'" and caracteristica="'.$data['caracteristica'].'";');
		return $query;
	}
	function addCaracteristica($data)
	{
		$query=$this->db->insert('caracteristicas',$data);
		return $query;
	}

	function maxCaracteristica()
	{
		$query=$this->db->query('select *from caracteristicas order by desc id_caracteristica')	;
		return $query;
	}
}
?>