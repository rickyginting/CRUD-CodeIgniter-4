<?php

namespace App\Controllers;

use App\Models\MhsModel;
use App\Models\DosenModel;

class Home extends BaseController
{

	public function index()
	{
		$MhsModel = new MhsModel();
		$DosenModel = new DosenModel();
		$data = [
			'title' => 'CRUD - CI 4',
			'nameapp' => $this->nameapp,
			'countmhs' => $MhsModel->countAllResults(),
			'countdosen' => $DosenModel->countAllResults()
		];

		return view('index', $data);
	}

	//--------------------------------------------------------------------

}
