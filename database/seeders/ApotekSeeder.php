<?php

namespace Database\Seeders;

use App\Models\DataObat;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ApotekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i =1 ;$i <= 20 ; $i++){
            DataObat::create([
                'nama_obat'=> $faker->name,
                'stok'=> $faker->numberBetween(20,40),
                'harga'=> $faker->buildingNumber(),
                'expired'=> $faker->date($format = 'Y-m-d', $max = 'now'),
                'supplier'=> $faker->company
            ]);
        }
    }
}
