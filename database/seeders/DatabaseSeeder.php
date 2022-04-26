<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            "admin" => true,
            "login" => "admin",
            "email" => "rogatih2017@yandex.ru",
            "password" => "qwerty",
        ]);
    }
}
