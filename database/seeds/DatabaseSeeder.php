<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
         $this->call(DepartementsTableSeeder::class);
         $this->call(FormationsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(SemestresTableSeeder::class);
         $this->call(ModulesTableSeeder::class); 
       //  $this->call(PublicationsTableSeeder::class);
         

    }
}
