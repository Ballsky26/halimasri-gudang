<?php namespace App\Models;
use CodeIgniter\Model;

class userAPIModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'grup'];
   
}


?>