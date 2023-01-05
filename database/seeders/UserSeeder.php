<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@com',
            'password' => '$2y$10$tcAd58vCtu7WV8oE0YGE7eAlcl/PfdqORtBjw8bl0CktaapRy513u',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
