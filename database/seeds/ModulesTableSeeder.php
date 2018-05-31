<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Module::create([
            'nom' => 'Algorithme',
            'formation_id' => 1,
            'semestre_id' => 1,
        ]);

        App\Module::create([
            'nom' => 'CRI',
            'formation_id' => 1,
            'semestre_id' => 1,
        ]);

        App\Module::create([
            'nom' => 'Analyse 1',
            'formation_id' => 1,
            'semestre_id' => 1,
        ]);

        App\Module::create([
            'nom' => 'SM',
            'formation_id' => 1,
            'semestre_id' => 2,
        ]);
        App\Module::create([
            'nom' => 'PSD',
            'formation_id' => 1,
            'semestre_id' => 2,
        ]);
        App\Module::create([
            'nom' => 'Analyse 2',
            'formation_id' => 1,
            'semestre_id' => 2,
        ]);

        App\Module::create([
            'nom' => 'TL',
            'formation_id' => 2,
            'semestre_id' => 3,
        ]);

        App\Module::create([
            'nom' => 'TG',
            'formation_id' => 2,
            'semestre_id' => 3,
        ]);

        App\Module::create([
            'nom' => 'SE',
            'formation_id' => 2,
            'semestre_id' => 3,
        ]);

        App\Module::create([
            'nom' => 'DAW',
            'formation_id' => 2,
            'semestre_id' => 4,
        ]);

        App\Module::create([
            'nom' => 'BD',
            'formation_id' => 2,
            'semestre_id' => 4,
        ]);

        App\Module::create([
            'nom' => 'BD',
            'formation_id' => 2,
            'semestre_id' => 4,
        ]);
    }
}
