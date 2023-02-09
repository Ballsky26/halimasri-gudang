<?php namespace App\Models;
use CodeIgniter\Model;

class Satuan_model extends Model
{
    protected $table = 'satuan';

    public function getSatuan($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            $res = $this->getWhere(['id' => $id]);
            return $res;
        }
    }

    public function saveSatuan($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }

    public function deleteSatuan($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 

    public function updateSatuan($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function countSatuan(){
        // $query = $this->db->table($this->table)->selectCount('id');
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }
}


?>