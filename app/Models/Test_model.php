<?php namespace App\Models;
use CodeIgniter\Model;

class Test_model extends Model
{
    protected $table = 'product';

    public function getProduct($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['product_id' => $id]);
        }
    }

    public function saveProduct($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}


?>