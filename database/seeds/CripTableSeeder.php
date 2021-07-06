<?php

use Illuminate\Database\Seeder;

class CripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = \App\Kriteria::find(1);
        $k->crip()->create([
            'nama_crip'     => '< Rp.1000.000,-',
            'nilai_crip'    => 1
        ]);

    }
}
