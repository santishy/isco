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
	function validarSrv($data)
	{
		$this->db->where('titulo',$data);
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
}