<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ModelCategorias');

	}

	public function index()
	{
		$this->home();
	}

	function home(){
		$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$this->load->view('includes/header');
		$this->load->view('site/inicio',$data);
		$this->load->view('includes/footer');

	}
}
