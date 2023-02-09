<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Barang_model;
use App\Models\Supplier_model;
use App\Models\Distributor_model;
use App\Models\Transaction_model;

class Operate extends BaseController
{
    public function index()
    {
        $data['title'] = 'Transaksi Supplier | Halima Sri';
        $data['label'] = 'Supplier';
        $data['cat'] = 'admin';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $transaksi = new Transaction_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['data'] = $transaksi->loadData();

        echo view('header_view', $data);
        echo view('nav_view');
        echo view('engineer/operate_view', $data);
        echo view('footer_view');
    }

    public function index_distibutor()
    {
        $data['title'] = 'Transaksi Distributor | Halima Sri';
        $data['label'] = 'Distributor';
        $data['cat'] = 'admin';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $transaksi = new Transaction_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['data'] = $transaksi->loadData();
        $data['active'] = "transaksi";
        echo view('header_view', $data);
        echo view('nav_view');
        echo view('engineer/operate_view', $data);
        echo view('footer_view');
    }

    public function index2()
    {
        $data['title'] = 'Transaksi Supplier | Halima Sri';
        $data['label'] = 'Supplier';
        $data['cat'] = 'view';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $transaksi = new Transaction_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['data'] = $transaksi->loadData();
        $data['active'] = "transaksi";
        echo view('header_view', $data);
        echo view('nav_view_v2');
        echo view('engineer/operate_view', $data);
        echo view('footer_view');
    }

    public function index2_distibutor()
    {
        $data['title'] = 'Transaksi Distributor | Halima Sri';
        $data['label'] = 'Distributor';
        $data['cat'] = 'view';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $transaksi = new Transaction_model();
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['data'] = $transaksi->loadData();
        $data['active'] = "transaksi";
        echo view('header_view', $data);
        echo view('nav_view_v2');
        echo view('engineer/operate_view', $data);
        echo view('footer_view');
    }

    public function laporan($x=null)
    {
        $data['title'] = 'Laporan | Halima Sri';
        $model = new Transaction_model();
        $data['active'] = "laporan";
        $data['cat'] = 'view';
        $data['all'] = $model->loadData();
        $data['masuk'] = $model->getDataMasuk();
        $data['keluar'] = $model->getDataKeluar();
        $data['graphMasuk'] = $model->getDataMasukforGraph();
        $data['graphMasukSelect'] = $model->getDataMasukSelect();
        $data['graphMasukSelectTahun'] = $model->getDataMasukSelectTahun();
        $data['graphKeluar'] = $model->getDataKeluarforGraph();
        $data['graphKeluarSelect'] = $model->getDataKeluarSelect();
        $data['graphKeluarSelectTahun'] = $model->getDataKeluarSelectTahun();

        $data['state'] = "normal";

        echo view('header_view', $data);
        if($x == 'view'){
            echo view('nav_view_v2', $data);
        } else {
            echo view('nav_view', $data);
        }
        echo view('engineer/laporan', $data);
        echo view('footer_view');
    }

    public function laporan_search_graph_masuk($x=null)
    {
        $data['title'] = 'Laporan | Halima Sri';
        $model = new Transaction_model();
        $model_barang = new Barang_model();
        $data['active'] = "laporan";
        $data['barang'] = $model_barang->getProduct();
        $data['cat'] = 'view';
        $data['all'] = $model->loadData();
        $data['masuk'] = $model->getDataMasuk();
        $data['keluar'] = $model->getDataKeluar();
        
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $masuk = $this->request->getPost('customRadio');
        // echo $masuk;
        if ($masuk == 'masuk'){
            $terpilih = 'masuk';
        } else if ($masuk == 'keluar'){
            $terpilih = 'keluar';
        } else {
            return false;
        }

        if ($terpilih == 'masuk'){
            $data['search'] = $model->getDataMasukforGraphCustomSearch($awal,$akhir);
        } else {
            $data['search'] = $model->getDataKeluarforGraphCustomSearch($awal,$akhir);
        }


        $data['graphMasuk'] = $model->getDataMasukforGraph();
        $data['graphMasukSelect'] = $model->getDataMasukSelect();
        $data['graphMasukSelectTahun'] = $model->getDataMasukSelectTahun();
        $data['graphKeluar'] = $model->getDataKeluarforGraph();
        $data['graphKeluarSelect'] = $model->getDataKeluarSelect();
        $data['graphKeluarSelectTahun'] = $model->getDataKeluarSelectTahun();

        $data['state'] = "masuk";
        

        echo view('header_view', $data);
        if($x == 'view'){
            echo view('nav_view_v2', $data);
        } else {
            echo view('nav_view', $data);
        }
        echo view('engineer/laporan', $data);
        echo view('footer_view');
    }

    

    public function all_trans()
    {
        $data['title'] = 'Semua Transaksi | Halima Sri';
        $model = new Transaction_model();
        $data['active'] = "transaksi";

        $data['all'] = $model->getDataLinked();

        echo view('header_view', $data);
        echo view('nav_view', $data);
        echo view('engineer/all_trans', $data);
        echo view('footer_view');
    }

    public function all_trans_v2()
    {
        $data['title'] = 'Semua Transaksi | Halima Sri';
        $model = new Transaction_model();
        $data['active'] = "transaksi";

        $data['all'] = $model->getDataLinked();

        echo view('header_view', $data);
        echo view('nav_view_v2', $data);
        echo view('engineer/all_trans_v2', $data);
        echo view('footer_view');
    }

    public function all_trans_search()
    {
        $data['title'] = 'Pencarian Transaksi | Halima Sri';
        $model = new Transaction_model();
        $data['active'] = "transaksi";
        $tahun = $this->request->getPost('tahun');
        $bulan = $this->request->getPost('bulan');

        $data['all'] = $model->getDataLinkedFilter($tahun, $bulan);

        echo view('header_view', $data);
        echo view('nav_view', $data);
        echo view('engineer/all_trans', $data);
        echo view('footer_view');
    }

    public function all_trans_search_v2()
    {
        $data['title'] = 'Pencarian Transaksi | Halima Sri';
        $model = new Transaction_model();
        $data['active'] = "transaksi";
        $tahun = $this->request->getPost('tahun');
        $bulan = $this->request->getPost('bulan');

        $data['all'] = $model->getDataLinkedFilter($tahun, $bulan);

        echo view('header_view', $data);
        echo view('nav_view_v2', $data);
        echo view('engineer/all_trans_v2', $data);
        echo view('footer_view');
    }

    public function transaksi()
    {
        $data['title'] = 'Transaksi | Halima Sri';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $transaksi = new Transaction_model();
        $data['active'] = "transaksi";
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['data'] = $transaksi->loadData();
        $data['dataAll'] = $transaksi->getTransaction();
        $data['dataAllLinked'] = $transaksi->getDataLinked();


        echo view('header_view', $data);
        echo view('nav_view');
        echo view('engineer/transaksi_view', $data);
        echo view('footer_view');
    }

    public function transaksi_viewer()
    {
        $data['title'] = 'Transaksi | Halima Sri';
        $model = new Barang_model();
        $supplier = new Supplier_model();
        $distributor = new Distributor_model();
        $transaksi = new Transaction_model();
        $data['active'] = "transaksi";
        $data['all'] = $model->getProduct();
        $data['cBarang'] = $model->countBarang();
        $data['cSupplier'] = $supplier->countSupplier();
        $data['cDistributor'] = $distributor->countDistributor();
        $data['supplier'] = $supplier->getSupplier();
        $data['distributor'] = $distributor->getDistributor();
        $data['data'] = $transaksi->loadData();
        $data['dataAll'] = $transaksi->getTransaction();
        $data['dataAllLinked'] = $transaksi->getDataLinked();


        echo view('header_view', $data);
        echo view('nav_view_v2');
        echo view('engineer/transaksi_view_v2', $data);
        echo view('footer_view');
    }

    public function save_transaction()
    {
        $model = new Transaction_model();
        $data['hold'] = $this->request->getPost('holderAll');
        $data['label'] = $this->request->getPost('labelJenis');
        $data['idDis'] = $this->request->getPost('jenisDis');
        $data['idSup'] = $this->request->getPost('jenisSup');
        $data['sup'] = $this->request->getPost('typeNya');
        $new = json_decode($data['hold'], true);

        $id = '';
        if ($data['idSup'] != '') {
            $id = $data['idSup'];
        } else {
            $id = $data['idDis'];
        }

        //  siapkan data
        for ($x = 0; $x <= count($new); $x++) {
            // echo $new[$x]['id_barang'];

            // check
            if ($data['idSup'] != '') {
                $total_temp =  $new[$x]['jumlah_barang'] * 1;
            } else {
                $total_temp =  $new[$x]['jumlah_barang'] * -1;
            }

            $save[$x] = array(
                'id_barang' => $new[$x]['id_barang'],
                'id_mitra' => $id,
                'id_admin' => '1',
                'value' => $total_temp,
                'tipe' => $data['sup'],
            );
        }
        // insert data
        for ($x = 0; $x <= count($save); $x++) {
            // echo $new[$x]['id_barang'];
            $trace = $model->saveTransaction($save[$x]);
        }

        session()->setFlashdata('success', 'Barang Berhasil ditambahkan');
        return redirect()->to('/operate/transaksi');
    }

    public function save_transaction_v2()
    {
        $model = new Transaction_model();
        $data['hold'] = $this->request->getPost('holderAll');
        $data['label'] = $this->request->getPost('labelJenis');
        $data['idDis'] = $this->request->getPost('jenisDis');
        $data['idSup'] = $this->request->getPost('jenisSup');
        $data['sup'] = $this->request->getPost('typeNya');
        $new = json_decode($data['hold'], true);

        $id = '';
        if ($data['idSup'] != '') {
            $id = $data['idSup'];
        } else {
            $id = $data['idDis'];
        }

        //  siapkan data
        for ($x = 0; $x <= count($new); $x++) {
            // echo $new[$x]['id_barang'];

            // check
            if ($data['idSup'] != '') {
                $total_temp =  $new[$x]['jumlah_barang'] * 1;
            } else {
                $total_temp =  $new[$x]['jumlah_barang'] * -1;
            }

            $save[$x] = array(
                'id_barang' => $new[$x]['id_barang'],
                'id_mitra' => $id,
                'id_admin' => '1',
                'value' => $total_temp,
                'tipe' => $data['sup'],
            );
        }
        // insert data
        for ($x = 0; $x <= count($save); $x++) {
            // echo $new[$x]['id_barang'];
            $trace = $model->saveTransaction($save[$x]);
        }

        session()->setFlashdata('success', 'Barang Berhasil ditambahkan');
        return redirect()->to('/operate/transaksi_viewer');
    }

    public function detail_trans($id){
        $data['title'] = "Detail Trans | Halima Sri ". $id;
        $model_trans = new Transaction_model();
        $data['set'] = $model_trans->getDatabyID($id);

        // print_r($data['chosen']);

        foreach ($data['set'] as $key) {
            if ($key->tipe == 'dist'){
                $data['chosen'] = $model_trans->getDatabyIDDist($id);
            } else {
                $data['chosen'] = $model_trans->getDatabyIDSup($id);
            }
        }

        // echo $data['chosen']->tanggal;

        $data['rowTarik'] = $model_trans->getRowForDetail($data['chosen']->tanggal);

        $data['active'] = "transaksi";
        $data['id'] = $id;
        
        echo view('header_view',$data);
        echo view('nav_view',$data);
        echo view('detail_trans',$data);
        echo view('footer_view');
    }

    public function detail_trans_v2($id){
        $data['title'] = "Detail Trans | Halima Sri ". $id;
        $model_trans = new Transaction_model();
        $data['set'] = $model_trans->getDatabyID($id);

        // print_r($data['chosen']);

        foreach ($data['set'] as $key) {
            if ($key->tipe == 'dist'){
                $data['chosen'] = $model_trans->getDatabyIDDist($id);
            } else {
                $data['chosen'] = $model_trans->getDatabyIDSup($id);
            }
        }

        // echo $data['chosen']->tanggal;

        $data['rowTarik'] = $model_trans->getRowForDetail($data['chosen']->tanggal);

        $data['active'] = "transaksi";
        $data['id'] = $id;
        
        echo view('header_view',$data);
        echo view('nav_view_v2',$data);
        echo view('detail_trans',$data);
        echo view('footer_view');
    }
}
