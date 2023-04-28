<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tyoes = [
            [
                'description' => 'Email',
                'created_at' => date("Y-m-d H:m:s")
            ],
            [
                'description' => 'Telefone',
                'created_at' => date("Y-m-d H:m:s")
            ]
        ];

        DB::table('contact_type')->insert($tyoes);
    }
}
