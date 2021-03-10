<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name'              => 'admin',
                'email'             => 'admin@argon.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('secret'),
                'type'              => User::$ADMINISTRATOR,
                'remember_token'    => null,
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ]);
    }
}
