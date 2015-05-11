<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Images_model','imagenes');
		$this->load->model('Userimages_model','userImage');
	}
	public function index()
	{
		$includes['include_css']	=	array('bootstrap.theme.css','cron.css','def.css');
		$includes['include_js']	=	array('index.js');

		$data['menu_activo']	=	'asas';
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
		$includes['include_css']	=	array('cron.css');
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
				"ruta"	=>	$rs->row()->KT_RUTAIMAGEN,
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
		$ip		=	$this->getIP();
		$nav	=	$_SERVER['HTTP_USER_AGENT'];
		//$rel	=	$_POST['rel'];
		$rel	=	2;
		$imgData	=	base64_decode(substr($_POST['img'],22));

		// Path en donde se va a guardar la imagen
		$nombreImagen	=	uniqid('uimg_').'.png';

		$file	=	IMG.'users/'.$nombreImagen;

		// borrar primero la imagen si existía previamente
		if (file_exists($file)) { unlink($file); }

		//guarda en el fichero la imagen contenida en $imgData
		$fp = fopen($file, 'w');
		if(fwrite($fp, $imgData)){
			$rs = $this->userImage->create($nombreImagen,date('Y-m-d'),date('H:i:s'),$ip,$nav,$rel);
			if($rs){
				die($this->userImage->getId_UserImage());
			}else{
				die('error');
			}
		}
		fclose($fp);
	}

	private function getIP(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */