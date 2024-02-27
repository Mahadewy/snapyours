<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table      = 'like';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'like_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['foto_id', 'user_id'];

    public function getGaleri($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['foto_id' => $id])->first();
    }

    public function likeFoto($foto_id, $user_id)
    {
        $data = [
            'foto_id' => $foto_id,
            'user_id' => $user_id
        ];

        return $this->insert($data);
    }

    public function unlikeFoto($foto_id, $user_id)
    {
        return $this->where(['foto_id' => $foto_id, 'user_id' => $user_id])->delete();
    }
}