<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            ProjectsTableSeeder::class
        ]);

        $this->command->info('Тестовые данные загружены!!!');
    }
}
