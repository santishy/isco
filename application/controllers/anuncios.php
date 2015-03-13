<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anuncios extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModelCategorias');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		
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

	}

	function getHeader(){
		$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$this->load->view('includes/header');
	}
}
