<?php

namespace App\Controllers;
use App\Models\FotoModel;
use App\Models\UsersModel;

class Beranda extends BaseController
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
    
    public function beranda(): string
    {
        $userid = $this->session->get('user_id');
        $user = $this->UsersModel->where('user_id', $userid)->first();
        $foto = $this->FotoModel->getRandomFoto();
        $data = [
            'foto' => $foto,
            'user' => $user,
        ];
        return view('beranda', $data);
    }
    
    public function login(): string
    {
        return view('login');
    }

    public function register(): string
    {
        return view('register');
    }

    public function profile($id): string
    {
        $user = $this->UsersModel->where('user_id', $id)->first();
        $data = [
            'user' => $user,
        ];
        return view('profile', $data);
    }

    public function editprofile($id): string
    {
        $user = $this->FotoModel->where('user_id', $id)->first();

        $data = [
            'title' => 'Profil',
            'user' => $user,
        ];
        return view('editprofile', $data);
        
    }

    public function unggah(): string
    {
        return view('unggah');
    }
    
    public function komentar(): string
    {
        return view('komentar');
    }
    

    public function kategori($kategori): string
    {
        $foto = $this->FotoModel->where('kategori', $kategori)->findAll();
        $data = [
            'foto' => $foto,
        ];
        return view('kategori', $data);
    }
    
}