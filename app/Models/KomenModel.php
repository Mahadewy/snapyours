<?php

namespace App\Models;

use CodeIgniter\Model;

class KomenModel extends Model
{
    protected $table = "komentar";
    protected $primaryKey = "komentar_id";
    protected $allowedFields    = ['foto_id', 'user_id', 'isi_komentar', 'tanggal_komentar'];

    public function getKomentar($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['komentar_id' => $id])->first();
    }
    
}