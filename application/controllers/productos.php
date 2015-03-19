<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModelCategorias');
		$this->load->model('ModelProductos');

	}

	public function index()
	{
		
	}

	function getFooter(){
		//$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$this->load->view('includes/footer');
	}

	function getHeader(){
		$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$this->load->view('includes/header',$data);
	}

	public function getProduct(){
		$id = $this->uri->segment(2);
		$data['product'] = $this->ModelProductos->getProducto($id);
		$data['carac'] = $this->ModelProductos->getCaracteristicas($id);
		$data['espe'] = $this->ModelProductos->getEspecificaciones($id);
		$data['imagenes'] = $this->ModelProductos->getImagenes($id);
		$this->getHeader();
		$this->load->view('site/productos',$data);
		$this->getFooter();
		
	}
	
}
