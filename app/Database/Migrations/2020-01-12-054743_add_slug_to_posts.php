<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSlugToPosts extends Migration
{
	public function up()
	{
		$field = [
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
		];
		$this->forge->addColumn('posts',$field);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropColumn('posts','slug');
	}
}
