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

        DB::table('categories')->insert([
            'name' => 'Food',
            'img' => 'https://image.flaticon.com/icons/svg/2836/2836674.svg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Stationary',
            'img' => 'https://image.flaticon.com/icons/svg/1966/1966242.svg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Pharmacy',
            'img' => 'https://image.flaticon.com/icons/svg/991/991847.svg'
        ]);

        DB::table('categories')->insert([
            'name' => 'Plumbing',
            'img' => 'https://image.flaticon.com/icons/svg/2385/2385467.svg'
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Electric',
            'img' => 'https://image.flaticon.com/icons/svg/1179/1179267.svg'
        ]);
        

        

    }
}
