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
            UsersTableSeeder::class,
            DepartmentsTableSeeder::class,
            JobsTableSeeder::class,
            ApplicantsTableSeeder::class,
            EmployeesTableSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ScheduleSeeder::class,
            PlanningSeeder::class,
            DepartmentSeeder::class,
            JobSeeder::class
        ]);
    }
}
