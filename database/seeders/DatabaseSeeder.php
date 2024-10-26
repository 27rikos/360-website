<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
    }
}