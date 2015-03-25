<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library("email");
		$this->load->model('ModelCategorias');
		$this->load->model('ModelProductos');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		$this->getHeader();
		$this->load->view('site/contacto');
		$this->getFooter();
		$this->load->view('includes/mapa');
		$this->load->view('includes/endfile');
	}

	function sendMail(){
		$this->email->from($this->input->post('txtemail'));
		$this->email->to('njl27@hotmail.com');
		$this->email->subject($this->input->post('txttitle'));
		$this->email->message($this->input->post('txtmensaje'));
		$this->email->send();
		  var_dump($this->email->print_debugger());

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
?>