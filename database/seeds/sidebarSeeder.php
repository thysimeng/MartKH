<?php

use Illuminate\Database\Seeder;

class sidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customize')->insert([
            'id' => 2,
            'name' => 'sidebar',
            'data' => '0',
            'created_at' => now(),
        ]);
    }
}
