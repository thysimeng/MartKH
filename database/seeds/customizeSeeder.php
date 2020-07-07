<?php

use Illuminate\Database\Seeder;

class customizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customize')->insert([
            'id' => 1,
            'name' => 'adsTemplate',
            'data' => 'template1',
            'created_at' => now(),
        ]);

        DB::table('customize_frans')->insert([
            'id' => 1,
            'user_id' => 1,
            'basicColor' => '#ff0000',
            'gradientColor' => NULL,
            'logo' => 'default.png',
            'darkMode' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
