<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }
    public function index()
    {
        //
    }
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            #'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }

    public function create()
    {
        $kelas = [
            [
                'id' => 1,
                'nama_kelas' => 'A'
            ],
            [
                'id' => 2,
                'nama_kelas' => 'B'
            ],
            [
                'id' => 3,
                'nama_kelas' => 'C'
            ],
            [
                'id' => 4,
                'nama_kelas' => 'D'
            ],
        ];

        $kelas = $this->kelasModel->getKelas();
        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ]);

        $data = [
            'kelas' => $kelas,
            'title' => 'Creat User'
        ];
        return view('create_user', $data);
    }

    public function store()
    {
        $userModel = new UserModel();

        $validationRules = [
            'nama' => 'required',
            'npm' => 'required|is_unique[user.npm]',
            'id_kelas' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembali ke halaman create_user dengan pesan kesalahan
            return redirect()->to(base_url('user/create'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama = $this->request->getVar('nama');
        $id_kelas = $this->request->getVar('id_kelas');
        $npm = $this->request->getVar('npm');

        // Cek apakah NPM sudah ada dalam database
        $existingUser = $userModel->where('npm', $npm)->first();
        if ($existingUser) {
            // NPM sudah ada dalam database, tampilkan pesan kesalahan
            session()->setFlashdata('error', 'NPM sudah ada dalam database.');
            return redirect()->to(base_url('user/create'))->withInput();
        }

        // Simpan data user jika NPM belum ada dalam database
        $insertData = [
            'nama' => $nama,
            'id_kelas' => $id_kelas,
            'npm' => $npm,
        ];

        if ($userModel->insert($insertData)) {
            // Data berhasil disimpan
            session()->setFlashdata('success', 'Data berhasil disimpan.');
        } else {
            // Gagal menyimpan data ke database
            session()->setFlashdata('error', 'Gagal menyimpan data ke database.');
        }

        $data = [
            'nama' => $nama,
            'id_kelas' => $id_kelas,
            'npm' => $npm,
        ];
        return view('profile', $data);
    }
}
