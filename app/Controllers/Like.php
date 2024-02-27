<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\FotoModel;
use App\Models\KomenModel;
use App\Models\LikeModel;

class like extends BaseController
{
    protected $usersModel;
    protected $fotoModel;
    protected $komenModel;
    protected $likeModel;
    protected $session;
    protected $validation;
    protected $jumlahLike;

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
}