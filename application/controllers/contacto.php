<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModelCategorias');
		$this->load->model('ModelProductos');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		$this->getHeader();
		$this->load->view('site/contacto');
		$this->getFooter();
		$this->load->view('includes/endfile');
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
	
}
