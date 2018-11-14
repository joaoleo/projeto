<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Eduardo Henrique Silva',
                'email' => 'eduardo.silva@empresa.com.br',
                'password' => bcrypt('123456'),
                'cargo_id' => 7,
                'tipo' => 'clt',
                'salario' => '6100.00',
                'vt' => null,
                'va' => '570.00',
                'vr' => '450.00',
                'plano_saude' => '317.62',
                'seguro_vida' => '35.00',
                'full_premiacao' => '500.00',
                'premiacao_trimestral' => '1500.00',
                'celular' => '230.00'
            ],
            [
                'name' => 'Guilherme de Paula',
                'email' => 'guilherme.paula@empresa.com.br',
                'password' => bcrypt('123456'),
                'cargo_id' => 8,
                'tipo' => 'pj',
                'salario' => '5000.00',
                'vt' => null,
                'va' => '600.00',
                'vr' => '500.00',
                'plano_saude' => '317.62',
                'seguro_vida' => '37.00',
                'full_premiacao' => '1000.00',
                'premiacao_trimestral' => '3000.00',
                'celular' => '230.00'
            ],
            [
                'name' => 'Pedro Rodrigues Almeida',
                'email' => 'pedro.almeida@empresa.com.br',
                'password' => bcrypt('123456'),
                'cargo_id' => 6,
                'tipo' => 'clt',
                'salario' => '5900.00',
                'vt' => null,
                'va' => '550.00',
                'vr' => '450.00',
                'plano_saude' => '220.10',
                'seguro_vida' => '32.00',
                'full_premiacao' => '500.00',
                'premiacao_trimestral' => '1500.00',
                'celular' => '230.00'
            ]
        ];

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
