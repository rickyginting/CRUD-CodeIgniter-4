<?php namespace App\Models;
use CodeIgniter\Model;
class DosenModel extends Model{
    protected $table ="tbl_dosen";
    protected $primaryKey = 'nip';
    protected $allowedFields =['nip','nama_dosen','slug_dosen','photo_dosen'];
    protected $useTimestamps = TRUE;

    public function getDosen($slug_dosen = false){
        if ($slug_dosen == false) {
           return $this->findAll();
        }
         return $this->where(['slug_dosen'=>$slug_dosen])->first();
    }
}