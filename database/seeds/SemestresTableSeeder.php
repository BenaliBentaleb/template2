<?php

use Illuminate\Database\Seeder;

class SemestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Semestre::create([
            'nom' => 'Semestre 1'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 2'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 3'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 4'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 5'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 6'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 7'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 8'
        ]);
        App\Semestre::create([
            'nom' => 'Semestre 9'
        ]);

        App\Semestre::create([
            'nom' => 'Semestre 10'
        ]);

    }
}
