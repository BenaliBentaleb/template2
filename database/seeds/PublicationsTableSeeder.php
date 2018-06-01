<?php

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        App\Publication::create([
            'user_id' => 9,
            'module_id' => 1,
            'titre' => 'Use any of the available button classes to quickly create a styled button.',
            'contenu' => '<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies elit vel placerat pellentesque.
            Vestibulum aliquam nulla ac vehicula eleifend. Pellentesque habitant morbi tristique senectus
            et netus et malesuada fames ac turpis egestas. Quisque dapibus ac tellus luctus cursus. Maecenas
            mattis sollicitudin arcu, vitae rhoncus magna varius sit amet. Duis ultricies sagittis magna,
            id ullamcorper turpis rhoncus sed. Curabitur sapien tellus, gravida id tellus eget, blandit
            egestas magna. Vestibulum ipsum augue, mattis in pellentesque non, dapibus quis velit. Interdum
            et malesuada fames ac ante ipsum primis in faucibus. Pellentesque suscipit fermentum convallis.
            Morbi aliquam vitae diam quis iaculis. Integer eget augue rutrum, vestibulum arcu vitae,
            porttitor augue. Phasellus non sodales quam, eu vestibulum tortor.
            <br>
            </p>',
            'type' => 'Status'
        ]);

        App\Publication::create([
            'user_id' => 8,
            'module_id' => 1,
            'titre' => 'FAQ blablablaa.',
            'contenu' => '<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies elit vel placerat pellentesque.
            Vestibulum aliquam nulla ac vehicula eleifend. Pellentesque habitant morbi tristique senectus
            et netus et malesuada fames<br>
            </p>',
            'type' => 'Tutorial'
        ]);

        
        App\Publication::create([
            'user_id' => 10,
            'module_id' => 1,
            'titre' => 'Sondage blablablaa.',
            'contenu' => '<p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultricies elit vel placerat pellentesque.
            Vestibulum aliquam nulla ac vehicula eleifend. Pellentesque habitant morbi tristique senectus
            et netus et malesuada fames<br>
            </p>',
            'type' => 'Status'
        ]);

    }
}
