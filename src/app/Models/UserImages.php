<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserImages extends CI_Model
{

    private $id_UserImage;
    private $kt_Ruta_UserImage;
    private $kt_Fecha;
    private $kt_Hora;
    private $kt_Ip;
    private $kt_Navegador;
    private $kt_Img_rel;
    private $kt_Estado;

    private $tabla = 'ktuserimage';

    public function create($kt_Ruta_UserImage, $kt_Fecha, $kt_Hora, $kt_Ip, $kt_Navegador, $kt_Img_rel, $kt_Estado = 1)
    {
        $this->kt_Ruta_UserImage = $kt_Ruta_UserImage;
        $this->kt_Fecha = $kt_Fecha;
        $this->kt_Hora = $kt_Hora;
        $this->kt_Ip = $kt_Ip;
        $this->kt_Navegador = $kt_Navegador;
        $this->kt_Img_rel = $kt_Img_rel;
        $this->kt_Estado = $kt_Estado;

        $data = array(
            'KT_RUTA_USERIMAGE' => $this->kt_Ruta_UserImage,
            'KT_FECHA' => $this->kt_Fecha,
            'KT_HORA' => $this->kt_Hora,
            'KT_IP' => $this->kt_Ip,
            'KT_NAVEGADOR' => $this->kt_Navegador,
            'KT_IMG_REL' => $this->kt_Img_rel,
            'KT_ESTADO' => $this->kt_Estado
        );
        $rs = $this->db->insert($this->tabla, $data);
        $this->id_UserImage = $this->db->insert_id();
        return $rs;
    }

    public function getId_UserImage()
    {
        return $this->id_UserImage;
    }
    public function setId_UserImage($id_UserImage)
    {
        $this->id_UserImage = $id_UserImage;
    }

    public function getKt_Ruta_UserImage()
    {
        return $this->kt_Ruta_UserImage;
    }
    public function setKt_Ruta_UserImage($kt_Ruta_UserImage)
    {
        $this->kt_Ruta_UserImage = $kt_Ruta_UserImage;
    }

    public function getKt_Fecha()
    {
        return $this->kt_Fecha;
    }
    public function setKt_Fecha($kt_Fecha)
    {
        $this->kt_Fecha = $kt_Fecha;
    }

    public function getKt_Hora()
    {
        return $this->kt_Hora;
    }
    public function setKt_Hora($kt_Hora)
    {
        $this->kt_Hora = $kt_Hora;
    }

    public function getKt_Ip()
    {
        return $this->kt_Ip;
    }
    public function setKt_Ip($kt_Ip)
    {
        $this->kt_Ip = $kt_Ip;
    }

    public function getKt_Navegador()
    {
        return $this->kt_Navegador;
    }
    public function setKt_Navegador($kt_Navegador)
    {
        $this->kt_Navegador = $kt_Navegador;
    }

    public function getKt_Img_rel()
    {
        return $this->kt_Img_rel;
    }
    public function setKt_Img_rel($kt_Img_rel)
    {
        $this->kt_Img_rel = $kt_Img_rel;
    }

    public function getKt_Estado()
    {
        return $this->kt_Estado;
    }
    public function setKt_Estado($kt_Estado)
    {
        $this->kt_Estado = $kt_Estado;
    }

    public function getTabla()
    {
        return $this->tabla;
    }
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;
    }
}

/* End of file UserImages_model.php */
/* Location: ./application/models/UserImages_model.php */