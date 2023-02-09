<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Test extends Controller
{
    public function index(){
        $data['title'] = "Hello CI 4";
        echo view('test_view', $data);
    }    
}


?>