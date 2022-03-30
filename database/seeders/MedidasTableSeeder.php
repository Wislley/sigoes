<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medidas = [
            [
                'nome' => 'Advertência verbal',
                'status' => true
            ],
            [
                'nome' => 'Advertência escrita com comunicação aos pais',
                'status' => true
            ],
            [
                'nome' => 'Obrigação de reparo de dano material causado',
                'status' => true
            ],
            [
                'nome' => 'Suspensão por escrito',
                'status' => true
            ],
            [
                'nome' => 'Desligamento da escola com documento de transferência',
                'status' => true
            ],
            [
                'nome' => 'Convocação dos responsáveis',
                'status' => true
            ],
            [
                'nome' => 'Outro',
                'status' => true
            ],
        ];

        DB::table('medidas')->insert($medidas);
    }
}
