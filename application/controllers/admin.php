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
		//$this->form_validation->set_rules('categoria','Categoria','required|callback_validarProd|trim');
		$this->form_validation->set_rules('precio','Precio','required|trim|callback_validarProd');
		$this->form_validation->set_rules('descripcion','Descripcion','required|trim');
		$this->form_validation->set_rules('nombreprod','Nombre','required|trim');
		$this->form_validation->set_rules('rutaImagen','Imagen','required|trim');
		//$this->form_validation->set_rules('destacado','Destacado','required');
		if($this->form_validation->run()===false)
		{
			$data['mensaje']="";
			$this->frmProducto($data);
		}
		else 
		{
			$data['nombreprod']=$this->input->post('nombreprod');
			$data['precio']=$this->input->post('precio');
			$data['id_categoria']=$this->input->post('id_categoria');
			$data['descripcion']=$this->input->post('descripcion');
			$data['destacado']=$this->input->post('destacado');
			$img['ruta']=$this->input->post('rutaImagen');
			$query=$this->ModelProductos->addProducto($data);
			$maxId=$this->ModelProductos->maxId();
			if($query)
				$data['mensaje']="Insercion Correcta";
			else 
				$data['mensaje']="Insercion Incorrecta";
			if(strlen($img['ruta'])>0)
			{
			 	foreach ($maxId->result() as $row) 
			 	{
			 		$img['id_producto']=$row->id_producto;
			 	}
			 	$query=$this->ModelProductos->addImgProd($img);
			}
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
		$num=$this->ModelCategorias->getCategory($data['nombre']);
		if($num->num_rows()>0)
			$query['ban']=0;
		else
		{
			$query['ban']=1;
			$this->ModelCategorias->addCategory($data);
			$consulta=$this->ModelCategorias->getMaxId();
			foreach ($consulta->result() as $row) 
			{
				$query['nombre']=$row->nombre;
				$query['id_categoria']=$row->id_categoria;
			}
		}
		echo json_encode($query);
	}
	public function validarProd($str)
	{
		$data=$this->input->post();
		$query=$this->ModelProductos->validarProd($data);
		if($query->num_rows()>0)
		{
			$this->form_validation->set_message('validarProd','Ya existe un accesorio con las mismas especificaciones');
			return false;
		} 
		else 
			return true;
	}

}
?>