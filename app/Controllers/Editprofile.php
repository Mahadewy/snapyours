<?php

namespace App\Controllers;
use App\Models\FotoModel;
use App\Models\UsersModel;

class editprofile extends BaseController
{
    protected $FotoModel;
    protected $UsersModel;
    protected $session;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->UsersModel = new UsersModel();
        $this->session = \Config\Services::session();
    }

   
    public function update($id)
    { 
        $user = $this->UsersModel->where('user_id', $id)->first();

        $fileFoto = $user['foto'];

        $data = [
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        
        $fileDokumen = $this->request->getFile('foto');
        if ($fileDokumen == "") {
            $nameFoto = $fileFoto;
        } else {
            if ($fileFoto != 'default_profil.jpg') {
                unlink('image_storage/' . $user['foto']);
            }
            $nameFoto = $fileDokumen->getRandomName();
            $fileDokumen->move('image_storage', $nameFoto);

            $session_Login = [
                'isLogin' => true,
                'user_id' => $user['user_id'],
                'foto' => $nameFoto,
            ];
            $this->session->set($session_Login);
        }


        $this->UsersModel->save([
            "user_id" => $id,
            "username" => $data['username'],
            'email' =>  $data['email'],
            'nama_lengkap' =>  $data['nama_lengkap'],
            'alamat' =>  $data['alamat'],
            'foto' => $nameFoto,
        ]);
        return redirect()->to('/profile/' . $id);

    }
    
}