<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Funcionarios')->insert([
            [
                'nome'          =>  'Luan Teste',
                'email'         =>  'luan@naotem.com',
                'cpf'           =>  '89443290014',
                'cargo'         =>  'Programador',
                'dataAdmissao'  =>  '2025-07-15',
                'salario'       =>  '4000',
                'created_at'    =>  date('Y-m-d H:i:s')
            ],
            [
                'nome'          =>  'Julio Teste',
                'email'         =>  'julio@naotem.com',
                'cpf'           =>  '28234487051',
                'cargo'         =>  'Analista',
                'dataAdmissao'  =>  '2023-09-15',
                'salario'       =>  '6000',
                'created_at'    =>  date('Y-m-d H:i:s')
            ],
            [
                'nome'          =>  'Dalila Teste',
                'email'         =>  'dalila@naotem.com',
                'cpf'           =>  '86531404094',
                'cargo'         =>  'Suporte',
                'dataAdmissao'  =>  '2024-04-09',
                'salario'       =>  '3500',
                'created_at'    =>  date('Y-m-d H:i:s')
            ],
        ]);
    }
}
