<?php namespace App\Models;
use CodeIgniter\Model;

class Barang_model extends Model
{
    protected $table = 'tbl_barang';

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

    public function deleteBarang($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 

    public function updateBarang($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function countBarang(){
        // $query = $this->db->table($this->table)->selectCount('id');
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }

}


?>