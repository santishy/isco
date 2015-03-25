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
		if(!$this->session->userdata('tipo'))
			redirect(base_url().'usuarios/login');
		if(strlen($this->input->post('id'))>0)
			$regla='required|trim';
		else
			$regla='required|trim|callback_validarSrv';
		$this->form_validation->set_rules('titulo','Titulo',$regla);
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
			if(strlen($this->input->post('id'))>0)
			{
				$validacion=$this->ModelServicio->validarSrvModi($data['titulo'],$this->input->post('id'));
				if($validacion->num_rows()==0)
				{
					$id=$this->input->post('id');
					$this->ModelServicio->modificarServicio($data,$id);
					$cadena="Modificación Correcta";
				}
				else
				{
					$id=$this->input->post('id');
					//$this->ModelServicio->modificarServicio($data,$id);
					$cadena="Ya existe un item con el mismo titulo";
				}
			}
			else 
			{
				$query=$this->ModelServicio->addServicio($data);
				if($query)
					$cadena="Inserción Correcta";
				else 
					$cadena="Inserción Incorrecta";
			}
			$this->frmservicio($cadena);
		}
	}
	public function frmservicio($cad)
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$data['mensaje']=$cad;
		$data[ 'query']=$this->ModelServicio->getLastServicios();
		$this->load->view('admin/header',$data);
		$this->load->view('servicios/addservicio');
		$this->load->view('servicios/sidebar');
		$this->load->view('admin/footer');
	}
	public function validarSrv($str)
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$titulo=$this->input->post('titulo');
		$query=$this->ModelServicio->validarSrv($titulo);
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
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$id=$this->input->post('id');
		$this->ModelServicio->eliminarServicio($id);
		$this->frmservicio("Equipo Eliminado");
	}
	function getServicio()
	{
		$id=$this->input->post('id');
		$query=$this->ModelServicio->getServicio($id);
		echo json_encode($query->result());
	}
	function buscarTitulo()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$titulo=$this->input->post('titulo');	
		$data[ 'query']=$this->ModelServicio->buscarTitulo($titulo);
		$data['mensaje']="";
		$this->load->view('admin/header',$data);
		$this->load->view('servicios/addservicio');
		$this->load->view('servicios/sidebar');
		$this->load->view('admin/footer');
	}
}
?>