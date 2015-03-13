<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelServicio');
		$this->form_validation->set_message('required', '%s es un campo requerido');
	}
	public function index()
	{
		
	}
	public function addServicio()
	{
		$this->form_validation->set_rules('titulo','Titulo','required|trim|callback_validarSrv');
		$this->form_validation->set_rules('contenido','Contenido','required|trim');
		$this->form_validation->set_rules('imagen','Imagen','required|trim');
		if($this->form_validation->run()===false)
		{
			$this->frmservicio("");
		}
		else
		{
			$data['titulo']=$this->input->post('titulo');
			$data['contenido']=$this->input->post('contenido');
			$data['imagen']=$this->input->post('imagen');
			if(strlen($this->input->post('slider'))>0)
				$data['slider']=$this->input->post('slider');
			$query=$this->ModelServicio->addServicio($data);
			if($query)
				$this->frmservicio("Inserción Correcta");
			else 
				$this->frm("Inserción Incorrecta");
		}
	}
	public function frmservicio($cad)
	{
		$data['mensaje']=$cad;
		$data[ 'query']=$this->ModelServicio->getLastServicios();
		$this->load->view('admin/header',$data);
		$this->load->view('servicios/addservicio');
		$this->load->view('servicios/sidebar');
		$this->load->view('admin/footer');
	}
	public function validarSrv($str)
	{
		$data=$this->input->post('titulo');
		$query=$this->ModelServicio->validarSrv($data);
		if($query->num_rows()>0)
		{
			$this->form_validation->set_message('validarSrv','Ya existe un servicio con ese titulo');
			return false;
		} 
		else 
			return true;
	}
	function eliminarServicio()
	{
		$id=$this->input->post('id');
		$this->ModelServicio->eliminarServicio($id);
		$this->frmservicio("Equipo Eliminado");
	}
}