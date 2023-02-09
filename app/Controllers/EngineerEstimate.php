<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Engine_model;

class EngineerEstimate extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard | Engineering Estimate Tool';
        $model = new Order_model();
        $data['all'] = $model->getProduct();
        return view('engineer/engine_view',$data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Layanan | Engineering Estimate Tool';
        return view('engineer/add_layanan_view',$data);
    }

    public function save(){

        if (!$this->validate([
        'kategori' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak boleh kosong'
            ]
        ],
        'tarif' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak boleh kosong'
            ]
        ],
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Tidak boleh kosong'
            ]
        ]
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }

    $model = new Engine_model();
    $data = array(
        'kategori' => $this->request->getPost('kategori'),
        'nama' => $this->request->getPost('nama'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'harga' => $this->request->getPost('tarif'),
    );
    $model->saveProduct($data);
    session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
    return redirect()->to('/dashboard');
}
}
