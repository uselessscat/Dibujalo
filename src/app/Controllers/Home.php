<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        // $this->load->model('Images_model', 'imagenes');
        // $this->load->model('UserImages_model', 'userImage');
    }

    public function index()
    {
        $includes['include_js'] = array(
            'countdowntimer.js',
            'dibuja.js',
            'index.js'
        );

        //$rs = $this->imagenes->getRndImage();
        //if ($rs->num_rows() > 0) {
        //    $datosImagen = array(
        //        'ruta' => $rs->row()->KT_RUTAIMAGEN,
        //        'nombre' => $rs->row()->KT_NOMBREIMAGEN,
        //        'id' => $rs->row()->KT_IDIMAGEN
        //    );
        //
        //    $data['images'] = json_encode($datosImagen);
        //}
        //

        echo view('index', $includes);
    }

    public function gallery()
    {
        $includes['include_css'] = array('bootstrap.theme.css', 'cron.css', 'def.css');
        $includes['include_js'] = array('index.js');

        echo view('index', $includes);
    }

    public function getRndImage()
    {
        $rs = $this->imagenes->getRndImage();
        if ($rs->num_rows() > 0) {
            $datosImagen = array(
                'ruta' => base_url() . IMG . $rs->row()->KT_RUTAIMAGEN,
                'nombre' => $rs->row()->KT_NOMBREIMAGEN,
                'id' => $rs->row()->KT_IDIMAGEN,
                'type' => 'ok'
            );

            die(json_encode($datosImagen));
        } else {
            die(json_encode(array('type' => 'error', 'msg' => 'error')));
        }
    }

    public function upload_image()
    {
        $base64Image = $this->input->post('img');
        $base64Image = str_replace('data:image/png;base64', '', $base64Image);
        $base64Image = str_replace(' ', '+', $base64Image);
        $imgData = base64_decode($base64Image);

        $ip = $this->input->ip_address();
        $nav = $this->input->server('HTTP_USER_AGENT');
        //$rel=$this->input->post('rel');
        $rel = 2;

        // Path en donde se va a guardar la imagen
        $nombreImagen = uniqid('uimg_') . '.png';
        $file = IMG . 'users/' . $nombreImagen;

        // borrar primero la imagen si existía previamente
        if (file_exists($file)) unlink($file);

        //guarda en el fichero la imagen contenida en $imgData
        if (file_put_contents($file, $imgData)) {
            $rs = $this->userImage->create($nombreImagen, date('Y-m-d'), date('H:i:s'), $ip, $nav, $rel);
            if ($rs) {
                die($this->userImage->getId_UserImage());
            } else {
                die('error');
            }
        }
    }
}
