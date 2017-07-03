<?php

use Illuminate\Database\Seeder;

class DropoffStoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dropoff_stores')->delete();
		$data = array (
			array(
				'id' => '1',
				'name' => 'Toko 1',
				'address' => 'Jalan 1',
				'handphone_number' => '081339595464',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '2',
				'name' => 'Toko 2',
				'address' => 'Jalan 2',
				'handphone_number' => '081339595466',
				'created_at' => date('Y-m-d')
			),
		);
		DB::table('dropoff_stores')->insert($data);
    }
}
