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
		$configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'iscoshy@gmail.com',
            'smtp_pass' => 'IscoShy1*%@',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );    
 
        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);
 
		$this->email->from($this->input->post('txtemail'),$this->input->post('txtname'));
		$this->email->to('francisco@grupoisco.com');
		$this->email->subject($this->input->post('txttitle'));
		$this->email->message('<p>Email enviado desde '.$this->input->post('txtemail').'</p>'.$this->input->post('txtmensaje'));
		//$this->email->send();
	  	//var_dump($this->email->print_debugger());
	  	$data['msj']='';
	  	if($this->email->send())
	  		$data['msj'] = "Tu correo ha sido enviado correctamente , en breve estaremos en contacto ";
	  	else
	  		$data['msj'] = 'No hemos podido enviar tu mensaje intentalo mas tarde';
	  	$this->getHeader();
	  	$this->load->view('site/msj',$data);
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
?>