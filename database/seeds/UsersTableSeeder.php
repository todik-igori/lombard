<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Администратор',
            'email'=>'todinov_igori@mail.ru',
            'password'=>bcrypt('12345678'),
            'is_admin'=>1,
        ]);
    }
}
