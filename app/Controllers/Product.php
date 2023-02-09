<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Test_model;

class Product extends Controller{
    public function index(){
        $model = new Test_model();
        $data['product'] = $model->getProduct();
        $data['hadri'] = 'Hadri';
        echo view('product_view',$data);
    }

    public function add_new(){
        echo view('add_product_view');
    }
    
    public function save(){
        $model = new Test_model();
        $data = array(
            'product_name' => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
        );
        $model->saveProduct($data);
        return redirect()->to('/product');
    }
}

?>