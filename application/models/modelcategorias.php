<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ModelCategorias extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getCategorias()
	{
		$this->db->select('*');
		$query=$this->db->get('categorias');
		return $query;
	}

	function categoriaName($id){
		$this->db->where('id_categoria',$id);
		$this->db->select('nombre');
		$query = $this->db->get('categorias');
		return $query;
	}

	function getCategoriasLimit(){
		$this->db->select('*');
		$this->db->limit(8);
		$query=$this->db->get('categorias');
		return $query;
	}

	function getCategory($nombre)
	{
		$this->db->where('nombre',$nombre);
		$this->db->select('*');
		$query=$this->db->get('categorias');
		return $query;
	}
	function addCategory($data)
	{
		$query=$this->db->insert('categorias',$data);
		return $query;
	}
	function getMaxId()
	{
		$query=$this->db->query('select  id_categoria,nombre from categorias where id_categoria=(
			select max(id_categoria) from categorias);');
		return $query;
	}
}
?>