<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'nom' => 'Bentaleb',
            'prenom' =>'Youssouf',
            'email' => 'y@y.me',
            'password' => bcrypt('123456')
        ]);

       App\Profile::create([
            'user_id' => $user->id,
            'photo_profile'=> 'assets/img/team-1-copyright-485x598.jpg',
            'telephone' => '066666666',
            'formation_id' =>1,
            'coverture' =>'assets/img/header.png',
            'information' => 'Lorem ipsum dolor sit amet consecteturae quod velit quo aut aperiam iste',
            'facebook' => 'facebook.com',
            'youtube' =>'youtube.com',
            'instagram' =>'instagram.com',
            'twitter' =>'twitter.com'
        ]);


        App\Role::create([
            'user_id'=> $user->id,
            'nom' =>'Administrateur'
        ]);

    
        App\Role::create([
            'user_id'=> $user->id,
            'nom' =>'Enseignant'
        ]);


      
      

        $user2 = App\User::create([
            'nom' => 'Aymen',
            'prenom' =>'Zebidi',
            'email' => 'a@a.me',
            'password' => bcrypt('123456')
        ]);

       App\Profile::create([
            'user_id' => $user2->id,
            'photo_profile'=> 'assets/img/team-1-copyright-485x598.jpg',
            'telephone' => '066666666',
            'formation_id' =>null,
            'coverture' =>'assets/img/header.png',
            'information' => 'et repellat inventore iusto exercitatione quod ribu',
            'facebook' => 'facebook.com',
            'youtube' =>'youtube.com',
            'instagram' =>'instagram.com',
            'twitter' =>'twitter.com'
        ]); 
        App\Role::create([
            'user_id'=> $user2->id,
            'nom' =>'Gérant club'
        ]);
    }
}