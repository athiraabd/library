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
        \App\User::create([
            'name' => 'Administrator',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
            'email' => 'admin@test.com'
        ]);


    }
}
