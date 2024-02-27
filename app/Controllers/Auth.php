<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $usersModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->usersModel = new UsersModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login(): string
    {
        return view('auth/login');
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function valid_register()
    {
        // Tangkap data dari form
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'confirm' => $this->request->getVar('confirm_password'),
            'email' => $this->request->getVar('email'),
        ];

        // Jalankan validasi
        if (!$this->validation->run($data, 'register')) {
            // Jika ada error kembalikan ke halaman register
            session()->setFlashdata('error', $this->validation->getErrors());
            return redirect()->to('/register');
        }

        if ($data['password'] != $data['confirm']) {
            session()->setFlashdata('pesan', 'Password tidak sama');
            return redirect()->to('/register');
        }


        $token = bin2hex(random_bytes(10));

        $email = \Config\Services::email();
        $email->setTo($data['email']);
        $email->setFrom('erniawatierniawati78@gmail.com', 'snapyoursofficial');
        $email->setSubject('Registrasi Akun');
        $email->setMessage('Selamat Datang ' . $data['username'] . ' di Snapyours, akun anda berhasil dibuat. Silahkan Activasi akun anda dengan klik link berikut :' . base_url() . 'auth/activate/' . $token);
        $email->send();


        // Masukkan data ke database
        $this->usersModel->save([
            'username' => $data['username'],
            'password' => md5($data['password']),
            'date_created' => date('Y-m-d'),
            'foto' => 'defaultprofile.jpg',
            'email' => $data['email'],
            'active' => $token,
        ]);

        // Arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('/');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ];

        //ambil data user di database yang usernamenya sama 
        $user = $this->usersModel->where('username', $data['username'])->first();

        //cek apakah password benar
        if ($user) {
            if ($user['password'] != md5($data['password'])) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/');
            } else {

                $this->session->set([
                    'isLogin' => true,
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                ]);
                //arahkan ke halaman beranda
                return redirect()->to('/beranda');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function activate($token)
    {
        if ($token) {
            $user = $this->usersModel->where(['active' => $token])->first();
            if ($user) {
                $this->usersModel->save([
                    'id_user' => $user['id_user'],
                    'active' => 'true'
                ]);

                session()->setFlashdata('pesan', 'Akun berhasil diaktivasi');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('pesan', 'Token tidak ditemukan');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('pesan', 'Token tidak ditemukan');
            return redirect()->to('/login');
        }
    }
}
