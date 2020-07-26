<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'nim'=>['type'=>'INT','constraint'=>15],
			'nama_mhs'=>['type'=>'VARCHAR','constraint'=>255],
			'slug_mhs'=>['type'=>'VARCHAR','constraint'=>255],
			'photo_mhs'=>['type'=>'VARCHAR','constraint'=>255],
			'nip'=>['type'=>'INT','constraint'=>15],
			'created_at'=>['type'=>'DATETIME'],
			'updated_at'=>['type'=>'DATETIME']
		]);

		$this->forge->addKey('nim',TRUE);
		$this->forge->createTable('tbl_mhs');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
