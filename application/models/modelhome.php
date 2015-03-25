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
		$this->db->limit(8);
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
			as des,nombreprod from 
		productos  where oferta=true and destacado=false order by id_producto desc limit 4');
		return $query;

	}

	function getDestacados(){
		$query = $this->db->query('select (select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=productos.id_producto))as imagen , id_producto,substring(descripcion,1,50)
			as des,nombreprod from 
		productos where destacado=true and oferta=false order by id_producto desc limit 4');
		return $query;

	}

	function getRecomendados(){
		$query = $this->db->query('select (select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=productos.id_producto))as imagen , id_producto,substring(descripcion,1,50)
			as des,nombreprod from 
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
			as des,nombreprod from 
		productos where destacado=false and oferta = false order by id_producto desc limit 4');
		return $query;

	}

	function countSearch($pattern){
		$query = $this->db->query('select count(distinct p.id_producto) as cantidad from 
		productos p inner join caracteristicas c on p.id_producto=c.id_producto join especificaciones e 
		on e.id_producto=p.id_producto where p.nombreprod like "%'.$pattern.'%" or  p.descripcion like "%'.$pattern.'%"
		or c.caracteristica like "%'.$pattern.'%" or e.especificacion like "%'.$pattern.'%";');
		return $query;
	}

	function search($pattern){
		$query = $this->db->query('select distinct(select ruta from imagenes where id_imagen=(select min(id_imagen) from 
			imagenes where id_producto=p.id_producto))as imagen,p.id_producto, 
		p.nombreprod,p.descripcion from productos p inner join caracteristicas c on 
		p.id_producto=c.id_producto join especificaciones e on e.id_producto=p.id_producto 
		where p.nombreprod like "%'.$pattern.'%" or  p.descripcion like "%'.$pattern.'%"
		or c.caracteristica like "%'.$pattern.'%" or e.especificacion like "%'.$pattern.'%" 
		order by p.id_producto desc ;');
		return $query;
	}

}
?>