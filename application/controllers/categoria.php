<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('ModelCategorias');
		$this->load->model('ModelProductos');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		$id = $this->uri->segment(2);
		$cantidad = 0;
		$uri_segment=3;
		$offset=$this->uri->segment($uri_segment);
		if (empty($offset))
			$offset=0;
		/* cantidad de elementos que regresa la consulta */
		$qty = $this->ModelProductos->countCat($id);
		foreach($qty->result() as $cant)
			$cantidad = $cant->cantidad;
		$data['offer'] = $this->ModelHome->getOffer();
		$data['categoria'] = '';
		// nombre de la categoria
		$query = $this->ModelCategorias->categoriaName($id);
		foreach($query->result() as $cat)
			$data['categoria'] = $cat->nombre;
		/*--------*/

		/* configuracion para la paginacion */
		$config['base_url']=base_url().'categoria/'.$id.'/';
		$config['total_rows'] = $cantidad;
		$config['per_page'] = 12; 
		$connfig['num_links']=5;
		$config['first_link']="Primero";
		$config['last_link']="Último";
		$config['next_link']="Siguiente";
		$config['prev_link']="Atrás";
		$config['cur_tag_open']="<strong>";
		$config['cur_tag_close']="</strong>";
		$config['uri_segment']=$uri_segment;
		$this->pagination->initialize($config); 
		$data['paginacion'] = $this->pagination->create_links();
		$data['result'] = $this->ModelProductos->prodCat($id,$offset,$config['per_page']);
		/*-----------------------*/
		$this->getHeader();
		$this->load->view('site/categoria',$data);
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