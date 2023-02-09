<?php namespace App\Models;
use CodeIgniter\Model;

class Engine_model extends Model
{
    protected $table = 'layanan';

    public function getProduct($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function saveProduct($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }
}


?>