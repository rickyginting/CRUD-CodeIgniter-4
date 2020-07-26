<?php

namespace App\Models;

use CodeIgniter\Model;

class MhsModel extends Model
{
    protected $table = 'tbl_mhs';
    protected $primaryKey = 'nim';
    protected $allowedFields = ['nim', 'nama_mhs', 'slug_mhs', 'photo_mhs', 'nip'];
    protected $useTimestamps = true;

    public function getMhs($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->join('tbl_dosen', 'tbl_dosen.nip = tbl_mhs.nip')->where([
            'slug_mhs' => $slug
        ])->first();
    }
}
