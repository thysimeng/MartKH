<?php

use Illuminate\Database\Seeder;

class BasicColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customize')->insert([
            'id' => 3,
            'name' => 'basicColor',
            'data' => '#fd0202',
            'created_at' => now(),
        ]);
    }
}
