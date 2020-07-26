<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Api extends BaseController
{
    public function index()
    {
        echo "Controller Api";
    }

    public function namaDosen()
    {
        $model = new DosenModel();
        // $request = \Config\Services::request();
        // $nama_dosen = $request->getPostGet('term');
        // $dosen = $model->like('nama_dosen', $nama_dosen)->findAll();
        // $w = array();
        // foreach ($dosen as $rt) :
        //     $w[] = [
        //         "label" => $rt['nama_dosen'],
        //         "nip" => $rt['nip'],
        //     ];

        // endforeach;
        $request = \Config\Services::request();
        $nama_dosen = $request->getPostGet('term');
        $dosen = $model->like('nama_dosen', $nama_dosen)->findAll();
        echo json_encode($dosen);
    }
}
