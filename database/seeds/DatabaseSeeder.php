<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('roles')->insert([
            'role' => 'buyer',
        ]);

        DB::table('roles')->insert([
            'role' => 'supplier',
        ]);

        DB::table('roles')->insert([
            'role' => 'admin',
        ]);

        DB::table('roles')->insert([
            'role' => 'delivery',
        ]);
        
        DB::table('neighborhoods')->insert([
            'neighborhood' => 'hood1',
        ]);

        DB::table('neighborhoods')->insert([
            'neighborhood' => 'hood2',
        ]);

        DB::table('neighborhoods')->insert([
            'neighborhood' => 'hood3',
        ]);

        DB::table('users')->insert([
            'name' => 'seller',
            'email' => 's@gmail.com',
            'password' => Hash::make('123456789'),
            'role_id' => '2',
            'hood_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'buyer',
            'email' => 'b@gmail.com',
            'password' => Hash::make('123456789'),
            'role_id' => '1',
            'hood_id' => '1',
        ]);
    }
}
