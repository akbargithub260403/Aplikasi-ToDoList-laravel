<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Hilman',
            'email'     => 'hilman@gmail.com',
            'password'  => Hash::make('12345678'),
            'avatar'    => '1613887563_img-3.jpg'
        ]);
        // User::factory(10)->create();
    }
}
