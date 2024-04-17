<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
               'name' => 'Админ',
               'email' => 'admin@gmail.com',
               'password' => bcrypt('123456789'),//для шифрования пароля
               'role_admin' => 1,
           ],
           ['name' => 'Михаил',
           'email' => 'misha@mail.ru',
           'password' => bcrypt('1234567890'),//для шифрования пароля
           'role_admin' => 0,

           ],


       ]);
    }
}
