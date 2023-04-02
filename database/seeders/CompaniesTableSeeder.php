<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = \App\Models\Company::factory(10)->create();

        foreach ($companies as $company) {
            DB::table('company_users')->insert([
                'company_id' => $company->id,
                'user_id' => User::all()->random()->id
            ]);
            DB::table('company_users')->insert([
                'company_id' => $company->id,
                'user_id' => User::all()->random()->id
            ]);
        }
    }
}
