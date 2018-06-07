<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Departement::create([
            'nom' => 'MI'
        ]);

        App\Departement::create([
            'nom' => 'IFA'
        ]);

        App\Departement::create([
            'nom' => 'TLSI'
        ]);
    }
}
