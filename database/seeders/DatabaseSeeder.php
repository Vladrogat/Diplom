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
        User::factory(1)->create([
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
                "description" => "",
                "idChapter" => 1
            ],
            [
                "name" => "Свойства магнитного поля",
                "description" => "",
                "idChapter" => 1
            ],
            [
                "name" => "Основные характеристики магнитного поля",
                "description" => "",
                "idChapter" => 1
            ],
            [
                "name" => "Явление электромагнитной индукции",
                "description" => "",
                "idChapter" => 2
            ],
            [
                "name" => "Самоиндукция",
                "description" => "",
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
        DB::table("questions")->insert([
            [
                "question" => "Что будет после?",
                "idTypeQuestion" => 1,
                "idSection" => 1
            ],
            [
                "question" => "Что будет дальше?",
                "idTypeQuestion" => 3,
                "idSection" => 1
            ],
            [
                "question" => "А как?",
                "idTypeQuestion" => 2,
                "idSection" => 3
            ],
            [
                "question" => "А будем дальше?",
                "idTypeQuestion" => 4,
                "idSection" => 1
            ],
            [
                "question" => "Будет все так как скажешь?",
                "idTypeQuestion" => 2,
                "idSection" => 1
            ],
        ]);
        DB::table("answers")->insert([
            [
                "answers" => json_encode(
                    [
                        "right" => "qwerty",
                        "answers" => [
                            "asdfg",
                            "werty",
                            "12345"
                        ]
                    ]),
                "question_id" => 1
            ]
        ]);
    }
}
