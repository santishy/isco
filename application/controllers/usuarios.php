<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('ModelUsuario');
		$this->form_validation->set_message('required', '%s es un campo requerido');
		$this->form_validation->set_message('min_length', '%s el campo debe contener minimo 6 letras');
		$this->form_validation->set_message('valid_email', '%s no es una direccion de correo');
	}
	function addUsuario()
	{
		if(!$this->session->userdata('tipo'))
			redirect(base_url().'usuarios/login');
		$this->form_validation->set_rules('nombre','Nombre','required|trim|callback_validUser');
		$this->form_validation->set_rules('correo','Email','required|trim|valid_email');
		$this->form_validation->set_rules('pass','Password','required|trim|min_length[6]');
		$this->form_validation->set_rules('user','Usuario','required|trim');
		$this->form_validation->set_rules('tipo','Nivel','required|trim');
		if($this->form_validation->run()===FALSE)
		{
			$data['mensaje']="";
			$this->frmUsuario($data);
		}
		else
		{
			$data=$this->input->post();
			$data['pass']=md5($data['pass']);
			$query=$this->ModelUsuario->addUsuario($data);
			if($query)
				$data['mensaje']="Insercion Correcta";
			else
				$data['mensaje']="Ocurrio un error";
			$this->frmUsuario($data);
		}
	}
	function frmUsuario($data)
	{
		if(!$this->session->userdata('tipo'))
			redirect(base_url().'usuarios/login');
		$data['query']=$this->ModelUsuario->getLastUsers();
		$this->load->view('admin/header',$data);
		$this->load->view('users/addusuario');
		$this->load->view('users/sidebar');
		$this->load->view('admin/footer');
	}
	function validUser()
	{
		if(!$this->session->userdata('tipo'))
			redirect(base_url().'usuarios/login');
		$usuario=$this->input->post('user');
		$pass=$this->input->post('pass');
		$query=$this->ModelUsuario->validUser($usuario,$pass);
		if($query->num_rows()>0)
		{
			$this->form_validation->set_message('validUser','Ya existe ese usuario o ese password, intente con otros');
			return false;
		}
		else
		{
			return true;
		}
	}
	//----------------------------------login---------------------------
	function login()
	{
		$this->form_validation->set_rules('user','Usuario','required|trim');
		$this->form_validation->set_rules('pass','Password','required|trim');
		if($this->form_validation->run()==FALSE)
		{
			$this->frmLogin('');
		}
		else 
		{
			$user=$this->input->post('user');
			$pass=md5($this->input->post('pass'));
			$query=$this->ModelUsuario->getUser($user,$pass);
			if($query->num_rows()>0)
			{
				foreach($query->result() as $row)
				{
					$this->session->set_userdata('user',$row->user);
					$this->session->set_userdata('tipo',$row->tipo);
				}
				redirect('admin/addProducto');
			}
			else
			{
				$this->frmLogin('Usuario o Password incorrecto');
			}
		}
		
	}
	function frmLogin($mensaje)
	{
		$data['mensaje']=$mensaje;
		$this->load->view('users/login',$data);
	}
	function cerrarSesion()
	{
		$this->session->sess_destroy();
		redirect(base_url().'usuarios/login');
	}
}