<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\FotoModel;
use App\Models\KomenModel;

class Search extends BaseController
{
    protected $usersModel;
    protected $fotoModel;
    protected $komenModel;
    protected $session;
    protected $validation;

    public function __construct()  
    {
        //membuat user model untuk konek ke database 
        $this->usersModel = new UsersModel();
        $this->fotoModel = new FotoModel();
        $this->komenModel = new KomenModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

   public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $foto = $this->fotoModel->getFotoByKeyword($keyword);
        $akun = $this->usersModel->getUserByKeyword($keyword);
    
    
        $data = [
            'validation' => \Config\Services::validation(),
            'foto' => $foto,
            'akun' => $akun,
            'keyword' => $keyword,
        ];
    
        return view('search', $data);
        
    }

    

}