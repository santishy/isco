<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelProductos');
		$this->load->model('ModelCategorias');
		$this->form_validation->set_message('required', '%s es un campo requerido');
	}
	
	public function index()
	{
		$this->load->view('admin/configuraciones');
	}

	public function addProducto()
	{
		$this->form_validation->set_rules('categoria','Categoria','required|callback_validarProd|trim');
		$this->form_validation->set_rules('precio','Precio','required|trim');
		$this->form_validation->set_rules('descripcion','Descripcion','required|trim');
		//$this->form_validation->set_rules('destacado','Destacado','required');
		if($this->form_validation->run()===false)
		{
			$data['mensaje']="";
			$this->frmProducto($data);
		}
		else 
		{
			$data=$this->input->post();
			$query=$this->ModelProductos->addProducto($data);
			if($query)
				$data['mensaje']="Insercion Correcta";
			else 
				$data['mensaje']="Insercion Incorrecta";
			$this->frmProducto($data);
		}
		
	}
	function addImg()
	{
		$config['upload_path']="./uploads/";
		$config['allowed_types']='gif|png|jpg|doc|pdf';
		$config['max_size']='2048';
		$config['max_width']='0';
		$config['max_height']='0';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload("user_file"))
		{
			//$data['mensaje']="Inserte la imagen correcta";
			//$error=$this->upload->display_errors('<div class="error">','</div>');
			//$this->frmProducto($data);
			echo 'error';
		}
		else
		{
			$data=$this->upload->data();
			echo $data['file_name'];
		}
	}
	function frmProducto($data)
	{
		$data['query']=$this->ModelCategorias->getCategorias();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/addproducto');
		$this->load->view('admin/footer');
	}
	function addCategory()
	{
		$data['nombre']=$this->input->post('nombre');
		$this->ModelCategorias->addCategory($data);
		$query=$this->ModelCategorias->getMaxId();
		echo json_encode($query->result());
	}
	public function validarProd($str)
	{
		$data=$this->input->post();
		$ban=true;
		foreach ($data as $key => $value) 
		{
			if(strlen($data[$key])==0)
			{
				$ban=false;
				break;
			}
		}
		if($ban)
		{
			$query=$this->ModelProductos->validarProd($data);
			if($query->num_rows()>0)
			{
				$this->form_validation->set_message('validarProd','Ya existe un accesorio con las mismas especificaciones');
				return false;
			} 
			else 
				return true;
		}
		else
			return false;
	}

}
?>