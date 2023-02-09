<?php
 
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\User_model;
use App\Models\Transaction_model;
 
class UserAPIController extends ResourceController
{
    use ResponseTrait;
    // all users USED
    public function index()
    {
        $transaksi = new Transaction_model();
        $data['data'] = $transaksi->loadData();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new User_model();
        $data = [
            'username' => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
        ];
        $mod = $model->login_act($data);
        // $mod = $model->where('username', $this->request->getVar('username'))->first();

        $res = [
            'input' => $data,
            'result' => $mod,
        ];
        
        return $this->respond($res);
    }

    
    // single user
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new ProductModel();
        $id = $this->request->getVar('id');
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga'  => $this->request->getVar('harga'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}