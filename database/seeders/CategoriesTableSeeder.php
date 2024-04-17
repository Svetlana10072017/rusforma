<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Авто и мото техника',
                'code' => 'cars',
                'image' => 'categories/cars.jpg',
            ],
            [
                'name' => 'Военная форма и одежда',
                'code' => 'forma',
                'image' => 'categories/forma.jpg',
            ],
            [
                'name' => 'Оружие',
                'code' => 'weapon',
                'image' => 'categories/appliance.jpg',
            ],
        ]);
    }
}
