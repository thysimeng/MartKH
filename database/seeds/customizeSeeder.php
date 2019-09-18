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
    }
}
