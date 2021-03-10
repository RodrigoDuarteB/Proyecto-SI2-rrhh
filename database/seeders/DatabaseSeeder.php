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
            //UsersTableSeeder::class,
            //DepartmentsTableSeeder::class,
            //JobsTableSeeder::class,
            DepartmentSeeder::class,
            JobSeeder::class,
            ApplicantsTableSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            EmployeesTableSeeder::class,
            ScheduleSeeder::class,
            PlanningSeeder::class
        ]);
    }
}
