<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            ['nome' => 'Trainee'], // 1
            ['nome' => 'Junior 1'], // 2
            ['nome' => 'Junior 2'], // 3
            ['nome' => 'Pleno 1'], //4
            ['nome' => 'Pleno 2'], // 5
            ['nome' => 'Senior 1'], // 6
            ['nome' => 'Senior 2'], // 7
            ['nome' => 'Coordenador Projeto 3'], // 8
            ['nome' => 'Gerente Projeto'] // 9
        ];

        foreach ($cargos as $cargo) {
            \App\Models\Cargo::create($cargo);
        }
    }
}
