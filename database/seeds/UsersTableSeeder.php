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
            'formation_id' => '1',
            'coverture' =>'assets/img/header.png',
            'information' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, et repellat inventore iusto exercitationem voluptatum doloremque molestiae quod velit quo aut aperiam iste, officia dolorem veniam odit doloribus modi? Dolore.',
            'facebook' => 'facebook.com',
            'youtube' =>'youtube.com',
            'instagram' =>'instagram.com',
            'twitter' =>'twitter.com',
        ]);


        App\Role::create([
            'user_id'=> $user->id,
            'nom' =>'Administrateur'
        ]);

        $user = App\User::create([
            'nom' => 'Benali',
            'prenom' =>'Djamel',
            'email' => 'd@d.me',
            'password' => bcrypt('123456')
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'photo_profile'=> 'assets/img/team-1-copyright-485x598.jpg',
            'telephone' => '066666666',
            'formation_id' => '1',
            'coverture' =>'assets/img/header.png',
            'information' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, et repellat inventore iusto exercitationem voluptatum doloremque molestiae quod velit quo aut aperiam iste, officia dolorem veniam odit doloribus modi? Dolore.',
            'facebook' => 'facebook.com',
            'youtube' =>'youtube.com',
            'instagram' =>'instagram.com',
            'twitter' =>'twitter.com',
        ]);
        App\Role::create([
            'user_id'=> $user->id,
            'nom' =>'Enseignant'
        ]);

        App\Role::create([
            'user_id'=> $user->id,
            'nom' =>'Administrateur'
        ]);

        $user = App\User::create([
            'nom' => 'Aymen',
            'prenom' =>'Zebidi',
            'email' => 'a@a.me',
            'password' => bcrypt('123456')
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'photo_profile'=> 'assets/img/team-1-copyright-485x598.jpg',
            'telephone' => '066666666',
            'formation_id' => '1',
            'coverture' =>'assets/img/header.png',
            'information' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, et repellat inventore iusto exercitationem voluptatum doloremque molestiae quod velit quo aut aperiam iste, officia dolorem veniam odit doloribus modi? Dolore.',
            'facebook' => 'facebook.com',
            'youtube' =>'youtube.com',
            'instagram' =>'instagram.com',
            'twitter' =>'twitter.com',
        ]);
        App\Role::create([
            'user_id'=> $user->id,
            'nom' =>'Gérant club'
        ]);
    }
}
