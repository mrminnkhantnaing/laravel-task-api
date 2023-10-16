<?php

namespace Database\Seeders;

use App\Models\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $users = [
            [
                'name' => 'Frank',
                'email' => 'frank@example.com',
                'password' => 'password',
            ],
            [
                'name' => 'Bruce',
                'email' => 'bruce@example.com',
                'password' => 'password',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
