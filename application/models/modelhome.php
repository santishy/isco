<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class ModelHome extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getSlider(){
		$this->db->where("slider",true);
		$this->db->order_by('id desc');
		$this->db->limit(6);
		$query = $this->db->get('servicios');
		return $query;

	}

	function detailServicio($id){
		$this->db->where("id",$id);
		$this->db->where("slider",false);
		$query = $this->db->get('servicios');
		return $query;
	}

	function getServicios(){
		$this->db->where("slider",false);
		$this->db->select('id,titulo');
		$query = $this->db->get('servicios');
		return $query;
	}

	function getSlide($id){
		$this->db->where("id",$id);
		//$this->db->where("slider",true);
		$query = $this->db->get('servicios');
		return $query;
	}

	function getOffer(){
		$query = $this->db->query('select (select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=productos.id_producto))as imagen , id_producto,substring(descripcion,1,50)
			as des,nombreProd from 
		productos  where oferta=true and destacado=false order by id_producto desc limit 4');
		return $query;

	}

	function getDestacados(){
		$query = $this->db->query('select (select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=productos.id_producto))as imagen , id_producto,substring(descripcion,1,50)
			as des,nombreProd from 
		productos where destacado=true and oferta=false order by id_producto desc limit 4');
		return $query;

	}

	function getRecomendados(){
		$query = $this->db->query('select (select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=productos.id_producto))as imagen , id_producto,substring(descripcion,1,50)
			as des,nombreProd from 
		productos where destacado=true and oferta = true order by id_producto desc limit 3');
		return $query;
	}
	
	function getServPrin(){
		$this->db->where("slider",false);
		$this->db->select('id,titulo');
		$this->db->limit(4);
		$query = $this->db->get('servicios');
		return $query;
	}

	function getNuevos(){
		$query = $this->db->query('select (select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=productos.id_producto))as imagen , id_producto,substring(descripcion,1,50)
			as des,nombreProd from 
		productos where destacado=false and oferta = false order by id_producto desc limit 4');
		return $query;

	}

}
?>