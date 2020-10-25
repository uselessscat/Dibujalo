<?php

namespace App\Models;

use CodeIgniter\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $primaryKey = 'id';

    private $kt_IdImagen;
    private $kt_NombreImagen;
    private $kt_RutaImagen;
    private $kt_Fecha;
    private $kt_Cat;
    private $kt_Sec;
    private $kt_Estado;


    public function create($kt_NombreImagen, $kt_RutaImagen, $kt_Fecha, $kt_Cat, $kt_Sec, $kt_Estado = 1)
    {
        $this->kt_NombreImagen = $kt_NombreImagen;
        $this->kt_RutaImagen = $kt_RutaImagen;
        $this->kt_Fecha = $kt_Fecha;
        $this->kt_Cat = $kt_Cat;
        $this->kt_Sec = $kt_Sec;
        $this->kt_Estado = $kt_Estado;

        $data = array(
            'KT_NOMBREIMAGEN' => $this->kt_NombreImagen,
            'KT_RUTAIMAGEN' => $this->kt_RutaImagen,
            'KT_FECHA' => $this->kt_Fecha,
            'KT_CAT' => $this->kt_Cat,
            'KT_SEC' => $this->kt_Sec,
            'KT_ESTADO' => $this->kt_Estado
        );
        $rs = $this->db->insert($this->table, $data);
        $this->kt_IdImagen = $this->db->insert_id();
        return $rs;
    }

    public function getRndImage()
    {
        $this->db->select('KT_IDIMAGEN,KT_NOMBREIMAGEN,KT_RUTAIMAGEN');
        $this->db->from($this->table);
        $this->db->where('KT_ESTADO', 1);
        $this->db->order_by('RAND()');
        $this->db->limit(1);

        return $this->db->get();
    }

    public function getKt_IdImagen()
    {
        return $this->kt_IdImagen;
    }
    public function setKt_IdImagen($kt_IdImagen)
    {
        $this->kt_IdImagen = $kt_IdImagen;
    }

    public function getKt_NombreImagen()
    {
        return $this->kt_NombreImagen;
    }
    public function setKt_NombreImagen($kt_NombreImagen)
    {
        $this->kt_NombreImagen = $kt_NombreImagen;
    }

    public function getKt_RutaImagen()
    {
        return $this->kt_RutaImagen;
    }
    public function setKt_RutaImagen($kt_RutaImagen)
    {
        $this->kt_RutaImagen = $kt_RutaImagen;
    }

    public function getKt_Fecha()
    {
        return $this->kt_Fecha;
    }
    public function setKt_Fecha($kt_Fecha)
    {
        $this->kt_Fecha = $kt_Fecha;
    }

    public function getKt_Cat()
    {
        return $this->kt_Cat;
    }
    public function setKt_Cat($kt_Cat)
    {
        $this->kt_Cat = $kt_Cat;
    }

    public function getKt_Sec()
    {
        return $this->kt_Sec;
    }
    public function setKt_Sec($kt_Sec)
    {
        $this->kt_Sec = $kt_Sec;
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
        return $this->table;
    }
    public function setTabla($tabla)
    {
        $this->table = $tabla;
    }
}
