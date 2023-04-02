<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
            'avatar' => 'https://via.placeholder.com/100x100',
            'role_id' => Role::ADMIN,
            'is_active' => '1',
        ]);

        User::create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
            'avatar' => 'https://via.placeholder.com/100x100',
            'role_id' => Role::USER,
            'created_by' => $admin->id,
            'is_active' => '1',
        ]);

        User::create([
            'name' => 'Ivan',
            'email' => 'ivan@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'),
            'remember_token' => Str::random(10),
            'avatar' => 'https://via.placeholder.com/100x100',
            'role_id' => Role::USER,
            'created_by' => $admin->id,
            'is_active' => '1',
        ]);

        \App\Models\User::factory(10)->create();
    }
}
