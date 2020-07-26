<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
	public function up()
	{
			$this->forge->addField([
				'nip'=>['type'=>'INT','constraint'=>15],
				'nama_dosen'=>['type'=>'VARCHAR','constraint'=>255],
				'slug_dosen'=>['type'=>'VARCHAR','constraint'=>255],
				'photo_dosen'=>['type'=>'VARCHAR','constraint'=>255],
				'created_at'=>['type'=>'DATETIME'],
				'updated_at'=>['type'=>'DATETIME']
			]);
	
			$this->forge->addKey('nip',TRUE);
			$this->forge->createTable('tbl_dosen');
		}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
