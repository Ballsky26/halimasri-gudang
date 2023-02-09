<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Barang_model;
use App\Models\Supplier_model;
use App\Models\Distributor_model;
use App\Models\User_model;
use App\Models\Satuan_model;
use App\Models\Jenis_barang_model;

class Dashboard extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard | Halima Sri';
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

    public function barang()
    {
        $data['title'] = 'Data Barang | Halima Sri';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['active'] = "barang";
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('dashboard_barang',$data);
        echo view('footer_view');
    }

    public function login()
    {       
        echo view('login/login');
    }

    public function login_action()
    {       
        $model = new User_model();
        $data = array(
            'username' => $this->request->getPost('email'),
            'password' => $this->request->getPost('pass'),
        );
        $session = $model->login_act($data);
        print_r($session);

        if ( sizeof($session) == 0 ){
            session()->setFlashdata('gagal', 'Pastikan user dan password anda benar');
            return redirect()->to('/Dashboard/login');
        } else {
            if($session[0]->grup == 'Admin'){
                return redirect()->to('/Operate/transaksi');
            }  else if ($session[0]->grup == 'Viewer') {
                return redirect()->to('/Operate/transaksi_viewer');
            } else {

            }
        }
    }

    public function setting()
    {
        $data['title'] = 'Data User | Halima Sri';
        $model = new User_model();
        $data['user'] = $model->getUser();
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('dashboard_user',$data);
        echo view('footer_view');
    }

    public function supplier()
    {
        $data['title'] = 'Data Supplier | Halima Sri';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['active'] = "supplier";
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('dashboard_supplier',$data);
        echo view('footer_view');
    }

    public function distributor()
    {
        $data['title'] = 'Data Distributor | Halima Sri';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['active'] = "distributor";
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('dashboard_distributor',$data);
        echo view('footer_view');
    }
    
        public function jenis_barang()
    {
        $data['title'] = 'Data Jenis Barang | Halima Sri';
        $model = new Jenis_barang_model();
        $data['all'] = $model->getJenis();
        $data['cJenis'] = $model->countJenis();
        $data['active'] = "jenis";
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('dashboard_jenis',$data);
        echo view('footer_view');
    }

    public function add_jenis(){
        $data['title'] = 'Input Satuan | Halima Sri';
        $data['subtitle'] = 'Input Jenis Barang';
        $data['tipe'] = 'jenis';
        $data['active'] = "jenis";
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_jenis',$data);
        echo view('footer_view');
    }

    public function save_jenis(){
        if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Jenis_barang_model();
        $data = array(
            'nama_jenis_barang' => $this->request->getPost('nama'),
        );
        // echo print_r($data);
        $model->saveJenis($data);
        echo print_r($model->errors());
        session()->setFlashdata('success', 'Satuan Berhasil ditambahkan');
        return redirect()->to('/dashboard/jenis_barang');
    }

    public function deleteJenis($id)
    {
        $model = new Jenis_barang_model();
        $model->deleteJenis($id);
        session()->setFlashdata('success', 'Jenis barang Berhasil dihapuskan');
        return redirect()->to('/dashboard/jenis_barang');
    }
    
    public function satuan()
    {
        $data['title'] = 'Data Satuan | Halima Sri';
        $model = new Satuan_model();
        $data['all'] = $model->getSatuan();
        $data['cSatuan'] = $model->countSatuan();
        $data['active'] = "satuan";
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('dashboard_satuan',$data);
        echo view('footer_view');
    }

    public function add_satuan(){
        $data['title'] = 'Input Satuan | Halima Sri';
        $data['subtitle'] = 'Input Satuan';
        $data['tipe'] = 'satuan';
        $data['active'] = "satuan";
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_satuan',$data);
        echo view('footer_view');
    }

    public function save_satuan(){
        if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new Satuan_model();
        $data = array(
            'nama_satuan' => $this->request->getPost('nama'),
        );
        // echo print_r($data);
        $model->saveSatuan($data);
        echo print_r($model->errors());
        session()->setFlashdata('success', 'Satuan Berhasil ditambahkan');
        return redirect()->to('/dashboard/satuan');
    }

    public function deleteSatuan($id)
    {
        $model = new Satuan_model();
        $model->deleteSatuan($id);
        session()->setFlashdata('success', 'Satuan Berhasil dihapuskan');
        return redirect()->to('/dashboard/satuan');
    }



    public function add_manual(){
        $model = new Satuan_model();
        $model_jenis = new Jenis_barang_model();
        $data['title'] = 'Input Barang | Halima Sri';
        $data['subtitle'] = 'Input Barang';
        $data['active'] = "barang";
        $data['satuan'] = $model->getSatuan();
        $data['jenis'] = $model_jenis->getJenis();
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_barang_view',$data);
        echo view('footer_view');
    }

    public function add_user(){
        $data['title'] = 'Tambah User | Halima Sri';
        $data['subtitle'] = 'Tambah User';
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_user',$data);
        echo view('footer_view');
    }

    public function add_supplier(){
        $data['title'] = 'Input Supplier | Halima Sri';
        $data['subtitle'] = 'Input Supplier';
        $data['tipe'] = 'supplier';
        $data['active'] = "supplier";
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_supplier_view',$data);
        echo view('footer_view');
    }

    public function add_distributor(){
        $data['title'] = 'Input Distributor | Halima Sri';
        $data['subtitle'] = 'Input Distributor';
        $data['tipe'] = 'distributor';
        $data['active'] = "distributor";
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('add_supplier_view',$data);
        echo view('footer_view');
    }

    public function approve($id){
        $data['title'] = 'Edit Barang | Halima Sri';
        $model_satuan = new Satuan_model();
        $model_jenis = new Jenis_barang_model();
        $model = new Barang_model();
        $data['record'] = $model->getProduct($id)->getRow();
        $data['active'] = "barang";
        $data['id'] = $id;
        $data['satuan'] = $model_satuan->getSatuan();
        $data['jenis'] = $model_jenis->getJenis();
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('approve_as_view',$data);
        echo view('footer_view');
    }

    public function editSupplier($id){
        $data['title'] = 'Edit Supplier | Halima Sri';
        $model = new Supplier_model();
        $data['record'] = $model->getSupplier($id)->getRow();
        $data['tipe'] = 'supplier';
        $data['id'] = $id;
        $data['active'] = "supplier";
        echo view('header_view',$data);
        echo view('nav_view');
        echo view('edit_supplier_view',$data);
        echo view('footer_view');
    }

    public function editDistributor($id){
        $data['title'] = 'Edit Distributor | Halima Sri';
        $model = new Distributor_model();
        $data['record'] = $model->getDistributor($id)->getRow();
        $data['tipe'] = 'distributor';
        $data['id'] = $id;
        $data['active'] = "distributor";
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
        return redirect()->to('/dashboard/supplier');
    }

    public function save_user(){
        if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'grup' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak boleh kosong'
                    ]
                ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $model = new User_model();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('email'),
            'grup' => $this->request->getPost('grup'),
            'password' => md5($this->request->getPost('password')),
        );
        // echo print_r($data);
        $model->saveUser($data);
        echo print_r($model->errors());
        session()->setFlashdata('success', 'User Berhasil ditambahkan');
        return redirect()->to('/dashboard/setting');
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
        return redirect()->to('/dashboard/distributor');
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
            'kd_barang' => $this->request->getPost('kode'),
        );
        // echo print_r($data);
        $model->saveProduct($data);
        // echo print_r($model->errors());
        session()->setFlashdata('success', 'Data Barang Berhasil ditambahkan');
        return redirect()->to('/dashboard/barang');
    }

    public function delete($id)
    {
        $model = new Barang_model();
        $model->deleteBarang($id);
        session()->setFlashdata('success', 'Barang Berhasil dihapuskan');
        return redirect()->to('/dashboard/barang');
    }

    public function deleteSupplier($id)
    {
        $model = new Supplier_model();
        $model->deleteSupplier($id);
        session()->setFlashdata('success', 'Supplier Berhasil dihapuskan');
        return redirect()->to('/dashboard/supplier');
    }

    public function deleteDistributor($id)
    {
        $model = new Distributor_model();
        $model->deleteDistributor($id);
        session()->setFlashdata('success', 'Distributor Berhasil dihapuskan');
        return redirect()->to('/dashboard/supplier');
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
        return redirect()->to('/dashboard/barang');
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
        return redirect()->to('/dashboard/supplier');
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
        return redirect()->to('/dashboard/distributor');
    }
    
    public function deleteUser($id)
    {
        if ($id == '1'){
            session()->setFlashdata('warn', 'User ini diproteksi');
            return redirect()->to('/dashboard/setting');
        }
        $model = new User_model();
        $model->deleteUser($id);
        session()->setFlashdata('success', 'User Berhasil dihapuskan');
        return redirect()->to('/dashboard/setting');
    }
}
