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
	function getLastCaracteristicas()
	{
		$query=$this->db->query('select *from productos order by id_producto desc limit 5;');
		return $query;
	}
	function getProducto($id)
	{
		$this->db->where('id_producto',$id);
		$query=$this->db->get('productos');
		return $query;
	}
	function change($data,$id)
	{
		$this->db->where('id_producto',$id);
		$this->db->update('productos',$data);
	}
	/*--------------------------------caracteristicas----------------------------------------*/
	function getCaracteristica($data)
	{
		$query=$this->db->query('select *from caracteristicas where id_producto='.$data['id_producto'].'
			and etiqueta_c="'.$data['etiqueta_c'].'" and caracteristica="'.$data['caracteristica'].'";');
		return $query;
	}

	function getCaracteristicas($id){
		$this->db->where('id_producto',$id);
		$query = $this->db->get('caracteristicas');
		return $query;
	}
	
	function addCaracteristica($data)
	{
		$query=$this->db->insert('caracteristicas',$data);
		return $query;
	}

	function maxCaracteristica()
	{
		$query=$this->db->query('select id_caracteristica,etiqueta_c,caracteristica from caracteristicas where id_caracteristica=(select max(id_caracteristica) from caracteristicas);');
		return $query;
	}
	function eliminarCaracteristica($data)
	{
		$this->db->where('id_caracteristica',$data['id_caracteristica']);
		$query=$this->db->delete('caracteristicas');
		return $query;
	}
	/*--------------------------------especifiaciones----------------------------------------*/
	function getEspecificacion($data)
	{
		$query=$this->db->query('select *from especificaciones where id_producto='.$data['id_producto'].'
			and etiqueta_e="'.$data['etiqueta_e'].'" and especificacion="'.$data['especificacion'].'";');
		return $query;
	}
	function getEspecificaciones($id){
		$this->db->where('id_producto',$id);
		$query = $this->db->get('especificaciones');
		return $query;
	}
	
	function addEspecificacion($data)
	{
		$query=$this->db->insert('especificaciones',$data);
		return $query;
	}

	function maxEspecificacion()
	{
		$query=$this->db->query('select id_especificacion,etiqueta_e,especificacion from especificaciones where id_especificacion=(select max(id_especificacion) from especificaciones);');
		return $query;
	}
	function eliminarEspecificacion($data)
	{
		$this->db->where('id_especificacion',$data['id_especificacion']);
		$query=$this->db->delete('especificaciones');
		return $query;
	}

	/*----------------imagenes ---------------------------*/

	function getImagenes($id){
		$this->db->where('id_producto',$id);
		$query = $this->db->get('imagenes');
		return $query;
	}	
}
?>