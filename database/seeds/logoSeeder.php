<?php

use Illuminate\Database\Seeder;

class logoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customize')->insert([
            'id' => 4,
            'name' => 'logo',
            'data' => '1570094964.png',
            'created_at' => now(),
        ]);
    }
}
