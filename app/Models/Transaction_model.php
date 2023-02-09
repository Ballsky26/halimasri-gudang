<?php namespace App\Models;
use CodeIgniter\Model;

class Transaction_model extends Model
{
    protected $table = 'transaksi';

    public function getTransaction($id = false){
        if($id === false){
            return $this->findAll();
        } else {
            $res = $this->getWhere(['id' => $id]);
            return $res;
        }
    }

    public function getDataLinked(){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.id_trans, a.tanggal, b.nama, a.value , b.volume, a.id_barang, a.tipe FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id ORDER BY a.tanggal DESC");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }

    public function getDatabyID($a){
        $query = $this->db
        ->query("SELECT a.tipe , a.id_trans, a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.id_trans = '$a' ");
        return $query->getResult(); 
    }

    public function getDatabyIDSup($a){
        $query = $this->db
        ->query("SELECT c.nama as nama_mitra ,c.jenis, c.pic, c.alamat, c.telp, a.tipe , a.id_trans, a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b, supplier c WHERE a.id_barang=b.id AND a.id_mitra = c.id AND a.id_trans = '$a' ");
        return $query->getRow(); 
    }

    public function getRowForDetail($a){
        $query = $this->db
        ->query("SELECT c.nama as nama_mitra ,c.jenis, c.pic, c.alamat, c.telp, a.tipe , a.id_trans, a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b, distributor c WHERE a.id_barang=b.id AND a.id_mitra = c.id AND a.tanggal = '$a' ");
        return $query->getResult(); 
    }

    public function getDatabyIDDist($a){
        $query = $this->db
        ->query("SELECT c.nama as nama_mitra ,c.jenis, c.pic, c.alamat, c.telp, a.tipe , a.id_trans, a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b, distributor c WHERE a.id_barang=b.id AND a.id_mitra = c.id AND a.id_trans = '$a' ");
        return $query->getRow(); 
    }

    public function getDataLinkedFilter($a,$b){
        $query = $this->db
        ->query("SELECT a.tanggal, b.nama, a.value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tanggal like '$a-$b%' ORDER BY a.tanggal DESC");
        return $query->getResult(); 
    }
    
    public function saveTransaction($data){
        $query = $this->db->table($this->table)->insert($data);
        return $query; 
    }

    public function getDataMasukforGraph(){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.tipe, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun, b.nama, SUM(a.value) as value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='sup' GROUP BY YEAR(a.tanggal), MONTH(a.tanggal), id_barang ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }
    
       public function getDataMasukforGraphCustomSearch($a,$b){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.tipe, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun, b.nama, SUM(a.value) as value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE tanggal BETWEEN '$a' AND '$b' AND a.id_barang=b.id AND a.tipe='sup' GROUP BY YEAR(a.tanggal), MONTH(a.tanggal), id_barang ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }

    public function getDataKeluarforGraphCustomSearch($a,$b){
        $query = $this->db
        // ->query("SELECT *, SUM(a.value) AS TOTAL FROM transaksi a, tbl_barang b WHERE a.id_barang=a.id_barang AND a.id_barang = b.id GROUP BY b.id");
        ->query("SELECT a.tipe, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun, b.nama, SUM(a.value) as value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE tanggal BETWEEN '$a' AND '$b' AND a.id_barang=b.id AND a.tipe='dist' GROUP BY YEAR(a.tanggal), MONTH(a.tanggal), id_barang ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        // ->select('tbl_barang.id,tbl_barang.nama,tbl_barang.jenis,tbl_barang.volume')
        // ->from('tbl_barang')
        // ->join('transaksi','tbl_barang.id = transaksi.id_barang', 'left')
        // ->get();
        return $query->getResult(); 
    }

    public function getDataMasukSelect(){
        $query = $this->db
        ->query("SELECT MONTH(a.tanggal) as bulan FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='sup' GROUP BY MONTH(a.tanggal) ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        return $query->getResult(); 
    }

    public function getDataMasukSelectTahun(){
        $query = $this->db
        ->query("SELECT YEAR(a.tanggal) as tahun FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='sup' GROUP BY YEAR(a.tanggal) ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        return $query->getResult(); 
    }

    public function getDataKeluarforGraph(){
        $query = $this->db
        ->query("SELECT a.tipe, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun, b.nama, SUM(a.value) as value , b.volume, a.id_barang FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='dist' GROUP BY YEAR(a.tanggal), MONTH(a.tanggal), id_barang ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        return $query->getResult(); 
    }

    public function getDataKeluarSelect(){
        $query = $this->db
        ->query("SELECT MONTH(a.tanggal) as bulan FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='dist' GROUP BY MONTH(a.tanggal) ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        return $query->getResult(); 
    }

    public function getDataKeluarSelectTahun(){
        $query = $this->db
        ->query("SELECT YEAR(a.tanggal) as tahun FROM transaksi a, tbl_barang b WHERE a.id_barang=b.id AND a.tipe='dist' GROUP BY YEAR(a.tanggal) ORDER BY MONTH(a.tanggal), YEAR(a.tanggal) DESC");
        return $query->getResult(); 
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
}


?>