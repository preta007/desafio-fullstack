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
        $tyoes[0] = [
            'description' => 'Email',
            'created_at' => date("Y-d-m H:m:s")
        ];

        $tyoes[1] = [
            'description' => 'Telefone',
            'created_at' => date("Y-d-m H:m:s")
        ];

        DB::table('contact_type')->insert($tyoes);
    }
}
