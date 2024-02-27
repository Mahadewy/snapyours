<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\UsersModel;

class Unggah extends BaseController
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

    public function upload()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('image_storage', $newName);



        $this->FotoModel->save([
            "judul_foto" => $this->request->getVar('JudulFoto'),
            'deskripsi_foto' => $this->request->getVar('DeskripsiFoto'),
            'tanggal_unggah' => date('Y-m-d'),
            'foto' => $newName,
            'user_id' => session()->get('user_id'),
            'kategori' => $this->request->getVar('kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/beranda');
    }

    public function edit($id)
    {
        $data = [
            'foto' => $this->FotoModel->where('foto_id', $id)->first(),
        ];
        return view('editpostingan', $data);
    }

    public function update($id)
    {
        $this->FotoModel->save([
            "foto_id" => $id,
            "judul_foto" => $this->request->getVar('JudulFoto'),
            'deskripsi_foto' => $this->request->getVar('DeskripsiFoto'),
            'kategori' => $this->request->getVar('kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/galeri/' . $id);
    }
    
    public function profile($id): string
    {
        $user = $this->UsersModel->where('user_id', $id)->first();
        $data = [
            'user' => $user,
        ];
        return view('profile', $data);
    }


    public function delete($id)
    {
        //hapus foto
        $this->FotoModel->delete($id);

        return redirect()->to('/beranda');
    }
}
