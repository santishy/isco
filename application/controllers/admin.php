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
		$this->addProducto();
	}

	public function addProducto()
	{
		if(!$this->session->userdata('tipo'))
			redirect(base_url().'usuarios/login');
		//$this->form_validation->set_rules('categoria','Categoria','required|callback_validarProd|trim');
		$this->form_validation->set_rules('precio','Precio','required|trim|callback_validarProd');
		$this->form_validation->set_rules('descripcion','Descripcion','required|trim');
		$this->form_validation->set_rules('nombreprod','Nombre','required|trim');
		//$this->form_validation->set_rules('rutaImagen','Imagen','required|trim');
		//$this->form_validation->set_rules('destacado','Destacado','required');
		if($this->form_validation->run()===false)
		{
			$data['mensaje']="";
			$data['id_producto']="";
			$this->frmProducto($data);
		}
		else 
		{
			if(strlen($this->input->post('id_producto')))
				$id=$this->input->post('id_producto');
			$data['nombreprod']=$this->input->post('nombreprod');
			$data['precio']=$this->input->post('precio');
			$data['id_categoria']=$this->input->post('id_categoria');
			$data['descripcion']=$this->input->post('descripcion');
			$data['destacado']=$this->input->post('destacado');
			$data['oferta']=$this->input->post('oferta');
			$img['ruta']=$this->input->post('rutaImagen');
			if(isset($id))
			{
				$this->change($data,$img,$id);
			}
			else
			{
				$this->add($data,$img);
			}
			
		}	
	}
	function add($data,$img)
	{
			if(!$this->session->userdata('tipo'))
				redirect('usuarios/login');
			$query=$this->ModelProductos->addProducto($data);
			$maxId=$this->ModelProductos->maxId();
			foreach ($maxId->result() as $row) 
			{
				$img['id_producto']=$row->id_producto;
			}
			if($query)
				$data['mensaje']="Insercion Correcta";
			else 
				$data['mensaje']="Insercion Incorrecta";
			if(strlen($img['ruta'])>0)
			{
			 	$query=$this->ModelProductos->addImgProd($img);
			}
			$data['id_producto']=$img['id_producto'];
			$this->frmProducto($data);
	}
	function change($data,$img,$id)
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$query=$this->ModelProductos->validarProd($data);
		if($query->num_rows() == 0)
		{
			$this->ModelProductos->change($data,$id);
			$img['id_producto']=$id;

			if(strlen($img['ruta'])>0)
			{
			 	$query=$this->ModelProductos->addImgProd($img);
			}
			$vec['mensaje']="Modificado";
			$vec['id_producto']=$id;
			$this->frmProducto($vec);
		}
		else
		{
			$vec['mensaje']="Ya existe ese producto";
			$this->frmProducto($vec);
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
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$data['query']=$this->ModelCategorias->getCategorias();
		if(!isset($data['caracteristicas']))
			$data['caracteristicas']=$this->ModelProductos->getLastCaracteristicas();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/addproducto');
		$this->load->view('admin/caracteristicas');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/footer');
	}
	public function getProducto()
	{
		$id=$this->input->post('id_producto');
		$query=$this->ModelProductos->getProducto($id);
		echo json_encode($query->result());
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
	#COMPROBAR FUNCION, HAY QUE ELIMINAR EL PRODUCTO DE OTRAS TABLAS...
	public function eliminarProducto()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$id_producto=$this->input->post('id_producto');
		$this->ModelProductos->eliminarImagenes($id_producto);
		$this->ModelProductos->eliminarCaracteristicas($id_producto);
		$this->ModelProductos->eliminarEspecificaciones($id_producto);
		$this->ModelProductos->eliminarProducto($id_producto);
		$data['mensaje']="";
		$data['id_producto']="";
		$this->frmProducto($data);
	}
	function buscarProducto()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$nombreprod=$this->input->post('nombreprod');
		$query=$this->ModelProductos->buscarProducto($nombreprod);
		$data["mensaje"]="";
		$data['id_producto']="";
		$data['caracteristicas']=$query;
		$this->frmProducto($data);
	}
	/*----------------------------------Categorias ------------------------------------------*/
	# agregar categoria---------
	function addCategory()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
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
	/*------------------------------------Caracteristicas-------------------------------------*/
	# agregar Caracteristica-----
	function addCaracteristica()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$data=$this->input->post();
		$ban=$this->validarEmpty($data);
		if($ban)
		{
			$query=$this->ModelProductos->getCaracteristica($data);
			if($query->num_rows()==0)
			{
				$vec=array();
				$query=$this->ModelProductos->addCaracteristica($data);
				$query=$this->ModelProductos->maxCaracteristica();
				foreach ($query->result() as $row) 
				{
					$vec['ban']=1;
					$vec['etiqueta_c']=$row->etiqueta_c;
					$vec['caracteristica']=$row->caracteristica;
					$vec['id_caracteristica']=$row->id_caracteristica;
				}
			}
			else 
				$vec['ban']=2;
		}
		else
			$vec['ban']=0;
		echo json_encode($vec);
	}
	#----------eliminar caracteristica---------------------------

	function eliminarCaracteristica()
	{
		$data=$this->input->post();
		$query=$this->ModelProductos->eliminarCaracteristica($data);
		echo $query;
	}
	#sacar todas las caracteristicas al apretar el boton circulo
	function getCaracteristicas()
	{
		$id_producto=$this->input->post('id_producto');
		$query=$this->ModelProductos->getCaracteristicas($id_producto);
		echo json_encode($query->result());
	}
	/***************************************ESPECIFICACIONES**********************************************/
	#AGREGAR ESPECIFICACION

	function addEspecificacion()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$data=$this->input->post();
		$ban=$this->validarEmpty($data);
		if($ban)
		{
			$query=$this->ModelProductos->getEspecificacion($data);
			if($query->num_rows()==0)
			{
				$vec=array();
				$query=$this->ModelProductos->addEspecificacion($data);
				$query=$this->ModelProductos->maxEspecificacion();
				foreach ($query->result() as $row) 
				{
					$vec['ban']=1;
					$vec['etiqueta_e']=$row->etiqueta_e;
					$vec['especificacion']=$row->especificacion;
					$vec['id_especificacion']=$row->id_especificacion;
				}
			}
			else 
				$vec['ban']=2;
		}
		else
			$vec['ban']=0;
		echo json_encode($vec);
	}
	#ELIMINAR ESPECIFICACION

	function eliminarEspecificacion()
	{
		if(!$this->session->userdata('tipo'))
			redirect('usuarios/login');
		$id_especificacion=$this->input->post('id_especificacion');
		$query=$this->ModelProductos->eliminarEspecificacion($id_especificacion);
		echo $query;
	}
	function validarEmpty($data)
	{
		$ban=true;
		foreach ($data as $key => $value) {
			if(strlen($data[$key])==0)
			{
				$ban=false;
				break;
			}
		}
		return $ban;
	}
	#sacar todas las especificaciones al apretar el button circulo
	function getEspecificaciones()
	{
		$id_producto=$this->input->post('id_producto');
		$query=$this->ModelProductos->getEspecificaciones($id_producto);
		echo json_encode($query->result());
	}
	
}
?>