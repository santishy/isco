<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('ModelCategorias');
		$this->load->model('ModelProductos');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		
	}

	function getFooter(){
		$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$data['principalserv'] = $this->ModelHome->getServPrin();
		$this->load->view('includes/footer',$data);
	}

	function getHeader(){
		$data['categorias']=$this->ModelCategorias->getCategorias();
		$data['servicios'] = $this->ModelHome->getServicios();
		$this->load->view('includes/header',$data);
	}

	public function getProduct(){
		$id = $this->uri->segment(2);
		$cat = 0;
		$idp = 0;
		$data['product'] = $this->ModelProductos->getProducto($id);
		$producto = $this->ModelProductos->getProducto($id);
		foreach ($producto->result() as $query) {
			$cat = $query->id_categoria;  
			$idp = $query->id_producto;  
		}
		$data['relacionados'] =  $this->ModelProductos->getProductsCat($cat,$idp);
		$data['carac'] = $this->ModelProductos->getCaracteristicas($id);
		$data['espe'] = $this->ModelProductos->getEspecificaciones($id);
		$data['imagenes'] = $this->ModelProductos->getImagenes($id);
		$this->getHeader();
		$this->load->view('site/productos',$data);
		$this->getFooter();
		$this->load->view('includes/zoom');
		$this->load->view('includes/endfile');
		
	}

	
	
}
?>