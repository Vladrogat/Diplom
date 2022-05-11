<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "is_admin" => true,
            "login" => "admin",
            "email" => "rogatih2017@yandex.ru",
            "password" => "qwerty",
        ]);
        DB::table("chapters")->insert([
            [
                "name" => "Электромагнетизм"
            ],
            [
                "name" => "Электромагнитная индукция"
            ]
        ]);
        DB::table("sections")->insert([
            [
                "name" => "Магнитное поле тока",
                "idChapter" => 1
            ],
            [
                "name" => "Свойства магнитного поля",
                "idChapter" => 1
            ],
            [
                "name" => "Основные характеристики магнитного поля",
                "idChapter" => 1
            ],
            [
                "name" => "Явление электромагнитной индукции",
                "idChapter" => 2
            ],
            [
                "name" => "Самоиндукция",
                "idChapter" => 2
            ]
        ]);

        DB::table("type_questions")->insert([
            [
                "name" => "Один ответ",
                "time" => 30,
            ],
            [
                "name" => "Несколько ответов",
                "time" => 40,
            ],
            [
                "name" => "Написать ответ",
                "time" => 60,
            ],
            [
                "name" => "Сопоставить определния",
                "time" => 50,
            ],
        ]);
        DB::table("answers")->insert([
            "answers" => json_encode([]),
        ]);
    }
}
