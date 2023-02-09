<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Barang_model;
use App\Models\Supplier_model;
use App\Models\Distributor_model;

class Dashboard extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard | Stock Warehouse';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('dashboard_view',$data);
        echo view('footer_view');
    }

    public function add_manual(){
        $data['title'] = 'Input Barang | Stock Warehouse';
        $data['subtitle'] = 'Input Barang';

        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_barang_view',$data);
        echo view('footer_view');
    }

    public function add_supplier(){
        $data['title'] = 'Input Supplier | Stock Warehouse';
        $data['subtitle'] = 'Input Supplier';
        $data['tipe'] = 'supplier';

        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_supplier_view',$data);
        echo view('footer_view');
    }

    public function add_distributor(){
        $data['title'] = 'Input Distributor | Stock Warehouse';
        $data['subtitle'] = 'Input Distributor';
        $data['tipe'] = 'distributor';
        
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_supplier_view',$data);
        echo view('footer_view');
    }

    public function approve($id){
        $data['title'] = 'Edit Barang | Stock Warehouse';
        $model = new Barang_model();
        $data['record'] = $model->getProduct($id)->getRow();

        $data['id'] = $id;
        
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('approve_as_view',$data);
        echo view('footer_view');
    }

    public function editSupplier($id){
        $data['title'] = 'Edit Supplier | Stock Warehouse';
        $model = new Supplier_model();
        $data['record'] = $model->getSupplier($id)->getRow();
        $data['tipe'] = 'supplier';
        $data['id'] = $id;
        
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('edit_supplier_view',$data);
        echo view('footer_view');
    }

    public function editDistributor($id){
        $data['title'] = 'Edit Distributor | Stock Warehouse';
        $model = new Distributor_model();
        $data['record'] = $model->getDistributor($id)->getRow();
        $data['tipe'] = 'distributor';
        $data['id'] = $id;
        
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('edit_supplier_view',$data);
        echo view('footer_view');
    }

    public function save_supplier(){
        if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'jenis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'pic' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Supplier_model();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'pic' => $this->request->getPost('pic'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        // echo print_r($data);
        $model->saveSupplier($data);
        echo print_r($model->errors());
        session()->setFlashdata('success', 'Supplier Berhasil ditambahkan');
        return redirect()->to('/dashboard');
    }

    public function save_distributor(){
        if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'jenis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'pic' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Distributor_model();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'pic' => $this->request->getPost('pic'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        // echo print_r($data);
        $model->saveDistributor($data);
        echo print_r($model->errors());
        session()->setFlashdata('success', 'Supplier Berhasil ditambahkan');
        return redirect()->to('/dashboard');
    }

    public function save(){
        if (!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
            'jenis' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
                ],
                'volume' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
        $model = new Barang_model();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'volume' => $this->request->getPost('volume'),
        );
        // echo print_r($data);
        $model->saveProduct($data);
        // echo print_r($model->errors());
        session()->setFlashdata('success', 'Barang Berhasil ditambahkan');
        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        $model = new Barang_model();
        $model->deleteBarang($id);
        session()->setFlashdata('success', 'Barang Berhasil dihapuskan');
        return redirect()->to('/dashboard');
    }

    public function deleteSupplier($id)
    {
        $model = new Supplier_model();
        $model->deleteSupplier($id);
        session()->setFlashdata('success', 'Supplier Berhasil dihapuskan');
        return redirect()->to('/dashboard');
    }

    public function deleteDistributor($id)
    {
        $model = new Distributor_model();
        $model->deleteDistributor($id);
        session()->setFlashdata('success', 'Distributor Berhasil dihapuskan');
        return redirect()->to('/dashboard');
    }

    public function edit(){
        $model = new Barang_model();
        $id = $this->request->getPost('idx');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'volume' => $this->request->getPost('volume'),
        );
        $result = $model->updateBarang($data,$id);
        session()->setFlashdata('success', 'Barang Berhasil diupdate');
        return redirect()->to('/dashboard');
    }

    public function editSupplierAct(){
        $model = new Supplier_model();
        $id = $this->request->getPost('idx');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'pic' => $this->request->getPost('pic'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $result = $model->updateSupplier($data,$id);
        session()->setFlashdata('success', 'Supplier Berhasil diupdate');
        return redirect()->to('/dashboard');
    }

    public function editDistributorAct(){
        $model = new Distributor_model();
        $id = $this->request->getPost('idx');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'pic' => $this->request->getPost('pic'),
            'telp' => $this->request->getPost('telp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $result = $model->updateDistributor($data,$id);
        session()->setFlashdata('success', 'Distributor Berhasil diupdate');
        return redirect()->to('/dashboard');
    }
}
