<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ModelUsuario extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function addUsuario($data)
	{
		$query=$this->db->insert('usuarios',$data);
		return $query;
	}
	function validUser($user,$pass)
	{
		$query=$this->db->query('select *from usuarios where user="'.$user.'" or pass="'.$pass.'";');
		return $query;
	}
	function getUser($user,$pass)
	{
		$query=$this->db->query('select *from usuarios where user="'.$user.'" and pass="'.$pass.'"');
		return $query;
	}
	function getLastUsers()
	{
		$query=$this->db->query('select *from usuarios order by id_user desc limit 5;');
		return $query;
	}
	function eliminarUser($id_user)
	{
		$this->db->where('id_user',$id_user);
		$query=$this->db->delete('usuarios');
		return $query;
	}
}