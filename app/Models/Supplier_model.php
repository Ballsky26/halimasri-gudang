<?php namespace App\Models;
use CodeIgniter\Model;

class Supplier_model extends Model
{
    protected $table = 'supplier';

    public function getSupplier($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            $res = $this->getWhere(['id' => $id]);
            return $res;
        }
    }

    public function saveSupplier($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }

    public function deleteSupplier($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 

    public function updateSupplier($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function countSupplier(){
        // $query = $this->db->table($this->table)->selectCount('id');
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }
}


?>