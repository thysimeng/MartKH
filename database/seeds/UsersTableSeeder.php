<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@martkh.com',
            'email_verified_at' => now(),
            'password' => Hash::make('martkh'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'admin',
            'avatar' => 'default.png'
        ]);

        DB::table('franchises')->insert([
            'id' => 1,
            'franchise_name' => 'User1',
            'address' => 'Default',
            'lat' => 1,
            'lng' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('franchise_user')->insert([
            'id' => 1,
            'franchise_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
