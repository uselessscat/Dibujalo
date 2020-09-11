<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Images_model','imagenes');
		$this->load->model('UserImages_model','userImage');
	}
	public function index()
	{
		$includes['include_css']	=	array('bootstrap.theme.css','cron.css','def.css');
		$includes['include_js']	=	array('dibuja.js','index.js');

		$data['menu_activo']	=	'index';
		$rs	=	$this->imagenes->getRndImage();
		if($rs->num_rows()>0){
			$datosImagen = array(
				"ruta"	=>	$rs->row()->KT_RUTAIMAGEN,
				"nombre"	=>	$rs->row()->KT_NOMBREIMAGEN,
				"id"	=>	$rs->row()->KT_IDIMAGEN
				);

			$data['images']	=	json_encode($datosImagen);
		}

		$this->load->view('common/header',$includes);
		$this->load->view('index',$data);
		$this->load->view('common/footer',$includes);
	}
	
	public function gallery(){
		$includes['include_css']	=	array('bootstrap.theme.css','cron.css','def.css');
		$includes['include_js']	=	array('index.js');

		$this->load->view('common/header',$includes);
		$this->load->view('index');
		$this->load->view('common/footer',$includes);
	}

	public function getLastUsersImages(){

	}

	public function getRndImage(){
		$rs	=	$this->imagenes->getRndImage();
		if($rs->num_rows()>0){
			$datosImagen = array(
				"ruta"	=>	base_url().IMG.$rs->row()->KT_RUTAIMAGEN,
				"nombre"	=>	$rs->row()->KT_NOMBREIMAGEN,
				"id"	=>	$rs->row()->KT_IDIMAGEN,
				'type' => 'ok'
				);

			die(json_encode($datosImagen));
		}else{
			die(json_encode(array('type' => 'error', 'msg'=>'error')));
		}
	}

	public function upload_image(){
		$base64Image	=	$this->input->post('img');
		$base64Image	=	str_replace('data:image/png;base64', '', $base64Image);
		$base64Image	=	str_replace(' ', '+', $base64Image);
		$imgData		=	base64_decode($base64Image);

		$ip		=	$this->input->ip_address();
		$nav	=	$this->input->server('HTTP_USER_AGENT');
		//$rel	=	$this->input->post('rel');
		$rel	=	2;

		// Path en donde se va a guardar la imagen
		$nombreImagen	=	uniqid('uimg_').'.png';
		$file	=	IMG.'users/'.$nombreImagen;

		// borrar primero la imagen si existía previamente
		if (file_exists($file)) unlink($file);

		//guarda en el fichero la imagen contenida en $imgData
		if( file_put_contents($file, $imgData) ){
			$rs = $this->userImage->create($nombreImagen,date('Y-m-d'),date('H:i:s'),$ip,$nav,$rel);
			if($rs){
				die($this->userImage->getId_UserImage());
			}else{
				die('error');
			}
		}
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */