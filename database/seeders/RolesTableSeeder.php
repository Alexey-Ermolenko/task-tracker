<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'code' => Role::ADMIN,
                'name' => 'ADMIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'code' => Role::USER,
                'name' => 'USER',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
