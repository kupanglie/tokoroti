<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
		$data = array (
			array(
				'id' => '1',
				'category_id' => 1,
				'production_id' => 1,
				'name' => 'Roti Tabur 8',
				'price' => '14000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '2',
				'category_id' => 1,
				'production_id' => 1,
				'name' => 'Roti Manis',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '3',
				'category_id' => 1,
				'production_id' => 1,
				'name' => 'Roti Kotak',
				'price' => '17500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '4',
				'category_id' => 1,
				'production_id' => 2,
				'name' => 'Roti Balok Coklat',
				'price' => '14000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '5',
				'category_id' => 1,
				'production_id' => 2,
				'name' => 'Roti Balok Keju',
				'price' => '14000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '6',
				'category_id' => 1,
				'production_id' => 2,
				'name' => 'Roti Boy',
				'price' => '6000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '7',
				'category_id' => 1,
				'production_id' => 3,
				'name' => 'Roti Mocca',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '8',
				'category_id' => 1,
				'production_id' => 3,
				'name' => 'Roti Assorted',
				'price' => '18000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '9',
				'category_id' => 1,
				'production_id' => 3,
				'name' => 'Roti Pizza Sosis',
				'price' => '8500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '10',
				'category_id' => 1,
				'production_id' => 4,
				'name' => 'Roti Sisir',
				'price' => '11000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '11',
				'category_id' => 1,
				'production_id' => 4,
				'name' => 'Roti Sisir 2 Rasa',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '12',
				'category_id' => 1,
				'production_id' => 5,
				'name' => 'Roti Kepang Coklat',
				'price' => '18500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '13',
				'category_id' => 1,
				'production_id' => 5,
				'name' => 'Roti Kepang Keju',
				'price' => '18500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '14',
				'category_id' => 1,
				'production_id' => 5,
				'name' => 'Roti Kepang 2 Rasa',
				'price' => '18500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '15',
				'category_id' => 1,
				'production_id' => 6,
				'name' => 'Roti Kelapa',
				'price' => '20000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '16',
				'category_id' => 1,
				'production_id' => 7,
				'name' => 'Roti Mini Coklat',
				'price' => '4000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '17',
				'category_id' => 1,
				'production_id' => 7,
				'name' => 'Roti Mini Keju Manis',
				'price' => '4000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '18',
				'category_id' => 1,
				'production_id' => 7,
				'name' => 'Roti Keju Asin',
				'price' => '4000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '19',
				'category_id' => 1,
				'production_id' => 7,
				'name' => 'Roti Mini Lain-lain',
				'price' => '4000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '20',
				'category_id' => 1,
				'production_id' => 7,
				'name' => 'Roti Pisang',
				'price' => '5000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '21',
				'category_id' => 1,
				'production_id' => 7,
				'name' => 'Roti Daging',
				'price' => '7000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '22',
				'category_id' => 1,
				'production_id' => 8,
				'name' => 'Roti Roll Keju',
				'price' => '6000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '23',
				'category_id' => 1,
				'production_id' => 8,
				'name' => 'Roti Roll Abon',
				'price' => '6000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '24',
				'category_id' => 1,
				'production_id' => 9,
				'name' => 'Roti Tabung Kismis',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '25',
				'category_id' => 1,
				'production_id' => 10,
				'name' => 'Roti Tawar',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '26',
				'category_id' => 1,
				'production_id' => 11,
				'name' => 'Roti Tawar Belang',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '27',
				'category_id' => 1,
				'production_id' => 12,
				'name' => 'Roti Donat',
				'price' => '5000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '28',
				'category_id' => 1,
				'production_id' => 13,
				'name' => 'Bolu Kukus',
				'price' => '4500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '29',
				'category_id' => 1,
				'production_id' => 14,
				'name' => 'Lapis SBY',
				'price' => '2500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '30',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Belinjo M/P',
				'price' => '11000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '31',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Bidaran Mini',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '32',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Blue Band Pot 250G',
				'price' => '12500',
				'created_at' => date('Y-m-d')
			),	
			array(
				'id' => '33',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Blue Band Sach 200G',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '34',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Borssalino',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '35',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Emping Jagung',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '36',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Enting2 Kacang',
				'price' => '9000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '37',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Gabin Wijen',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '38',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Jagung Pedas',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '39',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Jelly Inul',
				'price' => '3000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '40',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Jelly Tung',
				'price' => '3500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '41',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kacang Atom / Telur',
				'price' => '9000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '42',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kacang Medan',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '43',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kacang Polong',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '44',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kacang Shanghai',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '45',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kacang Utama',
				'price' => '9000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '46',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keju Procis',
				'price' => '9000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '47',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keripik Pisang',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '48',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keripik Ubi Pedas',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '49',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keripik Bayam',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '50',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keripik Sukun',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '51',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keripik Talas',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '52',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kue Rambut / Sambal',
				'price' => '8000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '53',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kuping Gajah',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '54',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kusuka Kecil',
				'price' => '7000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '55',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Meses Ceres 150G',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '56',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Manisan Mangga / Cerme',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '57',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Opak Lipat',
				'price' => '17500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '58',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Pang - Pang',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '59',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Pastel Segitiga',
				'price' => '5000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '60',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Permen Asam',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '61',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Permen Jelly / Dollar',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '62',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Pisang Sale Gulung',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '63',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Pisang Sale Keju',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '64',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Plintiran Kecil',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '65',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Selai Coklat / Kacang',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '66',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Selai Buah',
				'price' => '8500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '67',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Semprong Wijen / Samosa',
				'price' => '17500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '68',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Sompiah / Goldia',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '69',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Stick Balado',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '70',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Stick Bawang',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '71',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Stick Madu',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '72',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Sweet Corn',
				'price' => '3000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '73',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Taro Besar',
				'price' => '5000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '74',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Tawar Kering',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '75',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Twisko',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '76',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Yen - Yen / Nyam - Nyam',
				'price' => '3000',
				'created_at' => date('Y-m-d')
			),
			// array(
			// 	'id' => '77',
			// 	'category_id' => 2,
			// 	'production_id' => NULL,
			// 	'name' => 'Jelly Tung',
			// 	'price' => '3500',
			// 	'created_at' => date('Y-m-d')
			// ),
			array(
				'id' => '78',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Reginang',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '79',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Bola - Bola Coklat / Pel',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '80',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Kacang Bangkok',
				'price' => '10000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '81',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Pang - Pang Zeko',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '82',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Stick Keju',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '83',
				'category_id' => 2,
				'production_id' => NULL,
				'name' => 'Keripik Pisang',
				'price' => '15000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '84',
				'category_id' => 1,
				'production_id' => 12,
				'name' => 'Roti Donat Mini',
				'price' => '6000',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '85',
				'category_id' => 1,
				'production_id' => 12,
				'name' => 'Roti Donat Sate',
				'price' => '7500',
				'created_at' => date('Y-m-d')
			),
			array(
				'id' => '86',
				'category_id' => 1,
				'production_id' => NULL,
				'name' => 'Bakpao Kacang',
				'price' => '4000',
				'created_at' => date('Y-m-d')
			),
		);
		DB::table('items')->insert($data);
    }
}