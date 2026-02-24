<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Approved admin user for login (Agricart)
        User::updateOrCreate(
            ['email' => 'admin@agricart.pk'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'status' => 'approved',
                'is_approved' => true,
            ]
        );
    }
}
