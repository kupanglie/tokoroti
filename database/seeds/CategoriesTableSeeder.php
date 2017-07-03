<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
		$data = array (
			array(
				'id' => '1',
				'name' => 'Roti',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '2',
				'name' => 'Cemilan',
				'created_at' => date('Y-m-d')
			),
		);
		DB::table('categories')->insert($data);
    }
}
