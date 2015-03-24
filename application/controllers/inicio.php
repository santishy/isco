<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('ModelCategorias');
		$this->load->model('ModelHome');

	}

	public function index()
	{
		$this->home();
	}

	function getFooter(){
		$data['query']=$this->ModelCategorias->getCategoriasLimit();
		$this->load->view('includes/footer',$data);
	}

	function aviso(){
		$id = $this->uri->segment(3);
		$data['sliders'] = $this->ModelHome->getSlide($id);
		$this->getHeader();
		$this->load->view('site/aviso',$data);
		$this->getFooter();
		$this->load->view('includes/endfile');

	}

	function home(){
		$data['sliders'] = $this->ModelHome->getSlider();
		$data['ofertas'] = $this->ModelHome->getOffer();
		$data['destacados'] = $this->ModelHome->getDestacados();
		$data['novedades'] = $this->ModelHome->getNuevos();
		$data['recomendados'] = $this->ModelHome->getRecomendados();
		$data['principalserv'] = $this->ModelHome->getServPrin();
		$this->getHeader();
		$this->load->view('site/inicio',$data);
		$this->getFooter();
		$this->load->view('includes/endfile');

	}

	function getHeader(){
		$data['categorias']=$this->ModelCategorias->getCategorias();
		$data['servicios'] = $this->ModelHome->getServicios();
		$this->load->view('includes/header',$data);
	}

	function busqueda($pattern){
		$cantidad = 0;
		$uri_segment=3;
		$offset=$this->uri->segment($uri_segment);
		if (empty($offset))
			$offset=0;
		/* cantidad de elementos que regresa la consulta */
		$qty = $this->ModelHome->countSearch($pattern);
		foreach($qty->result() as $cant)
			$cantidad = $cant->cantidad;

		/* configuracion para la paginacion */
		$config['base_url']=base_url().'busqueda/'.$pattern.'/';
		$config['total_rows'] = $cantidad;
		$config['per_page'] = 1; 
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
		$data['results'] = $this->ModelHome->search($pattern,$offset,$config['per_page']);
		/*-----------------------*/

		$this->getHeader();
		$this->getFooter();
		$this->load->view('includes/endfile');
	}
	
}
