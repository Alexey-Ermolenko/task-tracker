<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('1234'),
            'role_id' => Role::ADMIN,
            'is_active' => '1',
        ]);

        User::create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('1234'),
            'role_id' => Role::USER,
            'created_by' => $admin->id,
            'is_active' => '1',
        ]);

        User::create([
            'name' => 'Ivan',
            'email' => 'ivan@example.com',
            'password' => Hash::make('1234'),
            'role_id' => Role::USER,
            'created_by' => $admin->id,
            'is_active' => '1',
        ]);
    }
}
