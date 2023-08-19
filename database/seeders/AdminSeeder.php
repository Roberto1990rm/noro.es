<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'robertoramirezmoreno@gmail.com',
            'password' => Hash::make('password'), 
            'is_admin' => true,
            'is_revisor' => false,
            'email_verified_at' => now(),
        ]);
    }
}
