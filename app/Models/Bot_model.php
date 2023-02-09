<?php namespace App\Models;
use CodeIgniter\Model;

class Bot_model extends Model
{
    protected $table = 'bot_respon';

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