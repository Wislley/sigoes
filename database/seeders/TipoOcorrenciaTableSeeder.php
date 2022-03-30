<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoOcorrenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposOcorrencias = [
            [
                'nome' => 'Acidente envolvendo Aluno',
                'status' => true
            ],
            [
                'nome' => 'Acidente envolvendo Funcionário',
                'status' => true
            ],
            [
                'nome' => 'Agressão Física',
                'status' => true
            ],
            [
                'nome' => 'Agressão Verbal',
                'status' => true
            ],
            [
                'nome' => 'Atraso',
                'status' => true
            ],
            [
                'nome' => 'Bullying',
                'status' => true
            ],
            [
                'nome' => 'Cyberbullying',
                'status' => true
            ],
            [
                'nome' => 'Desacato a professor/funcionário',
                'status' => true
            ],
            [
                'nome' => 'Saída antecipada',
                'status' => true
            ],
            [
                'nome' => 'Indisciplina',
                'status' => true
            ],
            [
                'nome' => 'Porte de armas',
                'status' => true
            ],
            [
                'nome' => 'Porte de drogas',
                'status' => true
            ],
            [
                'nome' => 'Recusa a entrar ou retornar para a sala de aula',
                'status' => true
            ],
            [
                'nome' => 'Roubo',
                'status' => true
            ],
            [
                'nome' => 'Sinais de abuso',
                'status' => true
            ],
            [
                'nome' => 'Sinais de maus tratos',
                'status' => true
            ],
            [
                'nome' => 'Uso de drogas',
                'status' => true
            ],
            [
                'nome' => 'Venda de drogas',
                'status' => true
            ],
            [
                'nome' => 'Atentado ao pudor',
                'status' => true
            ],
            [
                'nome' => 'Outros',
                'status' => true
            ],
        ];

        DB::table('tipos_ocorrencias')->insert($tiposOcorrencias);
    }
}
