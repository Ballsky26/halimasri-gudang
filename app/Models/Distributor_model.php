<?php namespace App\Models;
use CodeIgniter\Model;

class Distributor_model extends Model
{
    protected $table = 'distributor';

    public function getDistributor($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            $res = $this->getWhere(['id' => $id]);
            return $res;
        }
    }

    public function saveDistributor($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }

    public function deleteDistributor($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 

    public function updateDistributor($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function countDistributor(){
        // $query = $this->db->table($this->table)->selectCount('id');
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }
}


?>