<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'role' => 'admin',
                'password' => bcrypt('admin123')
            ],
            [
                'name' => 'user',
                'email' => 'user@email.com',
                'role' => 'user',
                'password' => bcrypt('user123')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
