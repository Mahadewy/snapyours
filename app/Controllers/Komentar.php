<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\FotoModel;
use App\Models\KomenModel;
use App\Models\LikeModel;

class komentar extends BaseController
{
    protected $usersModel;
    protected $fotoModel;
    protected $komenModel;
    protected $likeModel;
    protected $session;
    protected $validation;
    protected $jumlahLike;

    public function __construct()  
    {
        //membuat user model untuk konek ke database 
        $this->usersModel = new UsersModel();
        $this->fotoModel = new FotoModel();
        $this->komenModel = new KomenModel();
        $this->likeModel = new LikeModel();
        $this->jumlahLike = new LikeModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function galeri($id)
    {
        $komentar = $this->komenModel->where('foto_id', $id)->findAll();
    
        // ambil gambar berdasarkan id
        $foto = $this->fotoModel->find($id);
        $userid = $foto['user_id'];
        $user = $this->usersModel->getUser($userid);
        $user_comment = $this->usersModel->findAll();

        $liked = $this->likeModel->where(['foto_id' => $id, 'user_id' => session()->get('user_id')])->first();
        $jumlahLike = $this->likeModel->where(['foto_id' => $id])->countAllResults();

        $data = [
            'foto' => $foto,
            'user' => $user,
            'komen' => $komentar,
            'user_comment' => $user_comment,
            'liked' => $liked,
            'jumlahLike' => $jumlahLike,
        ];

        return view('komentar', $data);
    }
    

        public function save($id)
    {
        // buatkan controller untuk menyimmpan komentar yang diambil dari form
        $this->komenModel->save([
            'foto_id' => $id,
            'user_id' => session()->get('user_id'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'tanggal_komentar' => date('Y-m-d'),
        ]);

        return redirect()->to('/galeri/' . $id);

    }

    public function like($id)
    {
        $user_id = $this->session->get('user_id');
        $this->likeModel->save([
            'foto_id' => $id,
            'user_id' => $this->session->get('user_id'),
            'tanggal_like' => date('Y-m-d'),
        ]);

        session()->setFlashdata('pesan', 'Berhasil Menyukai');
        return redirect()->to('/galeri/' . $id);
    }

    public function unlike($id)
    {
        $this->likeModel->where(['foto_id' => $id, 'user_id' => $this->session->get('user_id')])->delete();

        session()->setFlashdata('pesan', 'Berhasil Membatalkan Like');
        return redirect()->to('/galeri/' . $id);
    }

}