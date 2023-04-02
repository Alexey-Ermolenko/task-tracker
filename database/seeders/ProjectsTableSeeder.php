<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = \App\Models\Project::factory(30)->create();

        foreach ($projects as $project) {
            DB::table('users_projects')->insert([
                'project_id' => $project->id,
                'user_id' => User::all()->random()->id
            ]);
            DB::table('users_projects')->insert([
                'project_id' => $project->id,
                'user_id' => User::all()->random()->id
            ]);
        }
    }
}
