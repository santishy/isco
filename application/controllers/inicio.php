<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModelCategorias');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		$this->home();
	}

	function getFooter(){
		$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$this->load->view('includes/footer',$data);
	}

	function aviso(){
		$id = $this->uri->segment(3);
		$data['sliders'] = $this->ModelHome->getSlide($id);
		$this->getHeader();
		$this->load->view('site/aviso',$data);
		$this->getFooter();
		$this->load->view('includes/endfile');

	}

	function home(){
		$data['sliders'] = $this->ModelHome->getSlider();
		$data['ofertas'] = $this->ModelHome->getOffer();
		$data['destacados'] = $this->ModelHome->getDestacados();
		$data['novedades'] = $this->ModelHome->getNuevos();
		$data['recomendados'] = $this->ModelHome->getRecomendados();
		$data['principalserv'] = $this->ModelHome->getServPrin();
		$this->getHeader();
		$this->load->view('site/inicio',$data);
		$this->getFooter();
		$this->load->view('includes/endfile');

	}

	function getHeader(){
		$data['categorias']=$this->ModelCategorias->getCategorias();
		$data['servicios'] = $this->ModelHome->getServicios();
		$this->load->view('includes/header',$data);
	}
	
}
