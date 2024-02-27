<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $allowedFields    = ['username', 'password', 'email', 'nama_lengkap', 'alamat', 'foto', 'active'];

    public function getUser($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['user_id' => $id])->first();
    }

    public function getUserByKeyword($keyword)
    {
        return $this->like('username', $keyword)->orLike('nama_lengkap', $keyword)->findAll();
    }

    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }
}