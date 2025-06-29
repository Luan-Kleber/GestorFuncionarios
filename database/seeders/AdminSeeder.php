<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Admin')->insert([
            [
                'nome'          =>  'Marcos Admin',
                'username'      =>  'root',
                'password'      =>  password_hash('1234', PASSWORD_DEFAULT),
                'email'         =>  'marcos@naotem.com',
                'cpf'           =>  '89443290014',
                'admin'         =>  't',
                'created_at'    =>  date('Y-m-d H:i:s')
            ],
        ]);
    }
}
