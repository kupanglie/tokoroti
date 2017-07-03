<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->delete();
		$data = array (
			array(
				'id' => '1',
				'job_id' => '1',
				'name' => 'Pekerja 1',
				'handphone_number' => '081339595464',
				'path_identity_photo' => 'asd1',
				'path_personal_photo' => 'asd1',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '2',
				'job_id' => '1',
				'name' => 'Pekerja 2',
				'handphone_number' => '081339595464',
				'path_identity_photo' => 'asd2',
				'path_personal_photo' => 'asd2',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '3',
				'job_id' => '2',
				'name' => 'Supir 1',
				'handphone_number' => '081339595464',
				'path_identity_photo' => 'asd2',
				'path_personal_photo' => 'asd2',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '4',
				'job_id' => '2',
				'name' => 'Supir 2',
				'handphone_number' => '081339595464',
				'path_identity_photo' => 'asd2',
				'path_personal_photo' => 'asd2',
				'created_at' => date('Y-m-d')
			),
		);
		DB::table('workers')->insert($data);
    }
}
