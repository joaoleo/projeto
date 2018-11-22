<?php

use Illuminate\Database\Seeder;

class TaxasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxas = [
            ['nome' => 'DIV Imposto', 'valor' => 0.8632],
            ['nome' => 'Taxa Consultoria', 'valor' => 170.00],
            ['nome' => 'Taxa Coordenação', 'valor' => 185.00],
            ['nome' => 'Taxa Translado', 'valor' => null]
        ];

        foreach ($taxas as $taxa) {
            \App\Models\Taxa::create($taxa);
        }
    }
}
