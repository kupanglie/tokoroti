<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->delete();
		$data = array (
			array(
				'id' => '1',
				'name' => 'Mobil 01',
				'police_number' => 'DH 1 ORL',
				'location' => 'Kuanino',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '2',
				'name' => 'Mobil 02',
				'police_number' => 'DH 2 ORL',
				'location' => 'Oeba',
				'created_at' => date('Y-m-d')
			),
		);
		DB::table('cars')->insert($data);
    }
}
