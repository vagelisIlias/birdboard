<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $now = now(); // Get the current timestamp

        DB::table('users')->insert([
            [
                'name' => 'vag',
                'email' => 'vag@gmail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'nikos',
                'email' => 'nikos@gmail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'kostas',
                'email' => 'kostas@gmail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'giannis',
                'email' => 'giannis@gmail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'ody',
                'email' => 'ody@gmail.com',
                'email_verified_at' => $now,
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
