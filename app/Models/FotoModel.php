<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table = "foto";
    protected $primaryKey = "foto_id";
    protected $allowedFields    = ['foto', 'judul_foto', 'deskripsi_foto', 'tanggal_unggah', 'lokasi_file', 'album_id', 'user_id', 'kategori'];

    public function getFoto($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['foto_id' => $id])->first();
    }
    public function getRandomFoto()
    {
        return $this->orderBy('FotoID', 'RANDOM')->findAll();
    }

    public function getFotoByKeyword($keyword)
    {
        return $this->like('judul_foto', $keyword)->orLike('deskripsi_foto', $keyword)->findAll();
    }
    
}