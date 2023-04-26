<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Usuario 01',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1234'),

            ],

        ];
        DB::table('users')->insert($users);
    }
}