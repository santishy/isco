<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ModelServicio extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function addServicio($data)
	{
		$query=$this->db->insert('servicios',$data);
		return $query;
	}
	function validarSrv($titulo)
	{
		$this->db->where('titulo',$titulo);
		$query=$this->db->get('servicios');
		return $query;
	}
	function validarSrvModi($titulo,$id)
	{
		$this->db->where('titulo',$titulo);
		$this->db->where('id !=',$id);
		$query=$this->db->get('servicios');
		return $query;
	}
	function getLastServicios()
	{
		$query=$this->db->query('select *from servicios order by id desc limit 5;');
		return $query;
	}
	function eliminarServicio($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('servicios');
	}
	function modificarServicio($data,$id)
	{
		$this->db->where('id',$id);
		$query=$this->db->update('servicios',$data);
		return $query;
	}
	function getServicio($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('servicios');
		return $query;
	}
	function buscarTitulo($titulo)
	{
		$query=$this->db->query("select *from servicios where titulo like '%".$titulo."%'order by id desc limit 5;");
		return $query;
	}
}