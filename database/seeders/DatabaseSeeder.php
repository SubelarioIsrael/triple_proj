<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed a default user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'merc@merc.com'], // Unique field(s) to check
            [
                'username' => 'merc',
                'email' => 'merc@merc.com',
                'password' => 'merc',
                'type' => 'student',
                'contact_number' => '09121212121' // Always hash passwords
            ]
        );
        User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Unique field(s) to check
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'admin',
                'type' => 'admin',
                'contact_number' => '09121212121' // Always hash passwords
            ]
        );
    }
}
