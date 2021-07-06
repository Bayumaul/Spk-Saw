<?php

use Illuminate\Database\Seeder;
use App\Kriteria;
class KriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = Kriteria::create([
            'kode'      => 'C1',
            'nama'      => 'Penghasilan Orang Tua',
            'atribut'   => 'cost',
            'bobot'     => 20
        ]);
    }
}
