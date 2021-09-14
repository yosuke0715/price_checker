<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class priceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price')->insert([
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 4210,
                'gas_fee' => 3931,
                'wifi_bill' => 4733,
                'user1_bill' => 8950,
                'user2_bill' => 5634,
                'month' => 8
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 9
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 10
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 11
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 12
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 1
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 2
            ],
            [
                'rent' => 61830,
                'electric_bill' => 0,
                'water_bill' => 0,
                'gas_fee' => 0,
                'wifi_bill' => 0,
                'user1_bill' => 0,
                'user2_bill' => 0,
                'month' => 3
            ]
        ]);
    }
}