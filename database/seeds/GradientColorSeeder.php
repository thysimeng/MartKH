<?php

use Illuminate\Database\Seeder;

class GradientColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customize')->insert([
            'id' => 5,
            'name' => 'gradientColor',
            'created_at' => now(),
        ]);
    }
}
