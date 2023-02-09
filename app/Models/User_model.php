<?php namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tbl_user';

    public function getUser($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            $res = $this->getWhere(['id' => $id]);
            return $res;
        }
    }

    public function login_act($a){
        $user = $a['username'];
        $pass = md5($a['password']);
        $query = $this->db
        ->query("SELECT * FROM `tbl_user` WHERE username='$user' AND password ='$pass'  ");
        return $query->getResult(); 
    }

    public function getDataLinkedFilter($a,$b){
        $query = $this->db
        ->query("SELECT a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tanggal like '$a-$b%' ORDER BY a.tanggal DESC");
        return $query->getResult(); 
    }
    
    public function saveUser($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }


    public function getDataMasuk(){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.tipe,a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='sup' ORDER BY a.tanggal DESC");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }

    public function getDataKeluar(){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.tipe,a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='dist' ORDER BY a.tanggal DESC");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }

    public function loadData(){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.kd_barang, a.id, a.nama, a.volume, sum(b.value) as total FROM tbl_barang a LEFT JOIN transaksi b ON a.id=b.id_barang GROUP BY b.id_barang ORDER BY b.tanggal asc");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }
    
        public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    } 
}


?>