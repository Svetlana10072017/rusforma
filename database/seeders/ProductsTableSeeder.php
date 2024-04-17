<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'ГАЗ-АА Санитарный фургон',
                'code' => 'gaz_aa',
                'description' => 'ГАЗ-АА Санитарный фургон. Скорость 110 км/ч.
                Имеет 1000 слотов багажник, посадка 4 игрока, запаска, канистра, 4 бочки, 2 ящика, рюкзак, 2 слота под оружие, кассета.мятью на 128 gb',
                'price' => '2000',
                'category_id' => 1,
                'image' => 'products/iphone_xv.jpg',
            ],
            [
                'name' => 'Самоходное шасси Т-16М',
                'code' => 't_16m',
                'description' => 'Скорость 79-95 км/ч, посадка 2 игрока, багажник 500 слотов, 2 окраса,
                2 бочки, 2 ящика, бревна, доски, металл, рюкзак, оружие, канистра, кассата',
                'price' => '2000',
                'category_id' => 1,
                'image' => 'products/iphone_xv_pro.jpg',
            ],
            [
                'name' => 'Трактор ЮМЗ - 6',
                'code' => 'ymz_6',
                'description' => 'Скорость 105 км/ч, посадка 1 игрок, багажник 1000 слотов, 2 бочки,
                2 ящика, рюкзак, оружие, кассета, канистра, 2 расцветки',
                'price' => '2000',
                'category_id' => 1,
                'image' => 'products/Xiaomi_13T_Black.jpg',
            ],
            [
                'name' => 'PAZ - 3205 Apocalypse',
                'code' => 'paz_3205',
                'description' => 'Скорость 120 км/ч, багажник 1000 слотов, а так же слот под: канистру, 2 ящика, 2 сундука, 4 бочки, медвежонок, генератор, кассету. Посадка 3 игрока. 2 варианта цвета для образца, пулемет не стреляет и посадки там нет! Бронирован',
                'price' => '3000',
                'category_id' => 1,
                'image' => 'products/Galaxy_S22_Ultra_Front4_S Pen_Phantom_White_HI.jpg',
            ],
            [
                'name' => 'Броня экзоскелет Armor exoskeleton',
                'code' => 'exoskeleton',
                'description' => 'В комплекте: корпус, штаны, ботинки, шлем. Слоты под рюкзак, съемные карманы, поясная сумка, фляжка, 3 магазина, пистолет, нож, прибор ночного видения на шлеме.Защита от огнестрельного оружия, ручного холодного, гранат, так же держит удары животных медведей и волков',
                'price' => '1000',
                'category_id' => 2,
                'image' => 'products/marshall_major_iv_black.jpg',
            ],
            [
                'name' => 'Тактический боевой шлем',
                'code' => 'tact_shlem',
                'description' => 'Тактический боевой шлем. Слоты под очки ночного видения и фонарик',
                'price' => '500',
                'category_id' => 2,
                'image' => 'products/gopro.jpg',
            ],
            [
                'name' => 'Пистолет пулемет Дегтярева',
                'code' => 'degterev',
                'description' => '7,62-мм пистолеты-пулемёты образцов 1934, 1934/38[к. 2] и 1940 годов системы Дегтярёва (индекс ГАУ — 56-А-133) — различные модификации пистолета-пулемёта (ПП), разработанного советским оружейником Василием Дегтярёвым в начале 1930-х годов.',
                'price' => '1000',
                'category_id' => 3,
                'image' => 'products/video_panasonic.jpg',
            ],
            [
                'name' => 'СВТ-40 советская самозарядная винтовка',
                'code' => 'svt_40',
                'description' => 'советская самозарядная винтовка созданная в 1940 году и в том же году принятая на вооружение, изменеённая версия СВТ-38.',
                'price' => '500',
                'category_id' => 3,
                'image' => 'products/Siemens_EQ.500_integral_TQ505D09.jpg',
            ],



        ]);
    }
}
