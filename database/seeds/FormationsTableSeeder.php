<?php

use Illuminate\Database\Seeder;

class FormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
       App\Formation::create([
            'departement_id' => 1,
            'nom' =>'L1 - Tronc Commun',
            'type' => 'tronc cummun'
       ]);

       App\Formation::create([
        'departement_id' => 1,
        'nom' =>'L2 - Tronc Commun',
        'type' => 'tronc cummun'
        ]);

        App\Formation::create([
            'departement_id' => 2,
            'nom' =>'Licence TI',
            'type' => 'licence'
        ]);

        
        App\Formation::create([
            'departement_id' => 2,
            'nom' =>'Licence SCI',
            'type' => 'licence'
        ]);

        App\Formation::create([
            'departement_id' => 2,
            'nom' =>'Master 1 - STIC',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 2,
            'nom' =>'Master 1 - RSD',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 2,
            'nom' =>'Master 2 - STIC',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 2,
            'nom' =>'Master 2 - RSD',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 3,
            'nom' =>'Licence - GL',
            'type' => 'licence'
        ]);

        App\Formation::create([
            'departement_id' => 3,
            'nom' =>'Licence - SI',
            'type' => 'licence'
        ]);

        App\Formation::create([
            'departement_id' => 3,
            'nom' =>'Master 1 - GL',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 3,
            'nom' =>'Master 1 - STIW',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 3,
            'nom' =>'Master 2 - GL',
            'type' => 'master'
        ]);

        App\Formation::create([
            'departement_id' => 3,
            'nom' =>'Master 2 - STIW',
            'type' => 'master'
        ]);
    }
}
