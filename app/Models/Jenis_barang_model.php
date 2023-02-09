<?php namespace App\Models;
use CodeIgniter\Model;

class Jenis_barang_model extends Model
{
    protected $table = 'jenis_barang';

    public function getJenis($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            $res = $this->getWhere(['id' => $id]);
            return $res;
        }
    }

    public function saveJenis($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }

    public function deleteJenis($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 

    public function updateJenis($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function countJenis(){
        // $query = $this->db->table($this->table)->selectCount('id');
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }
}


?>