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
            "name" => "Влад",
            "login" => "admin",
            "email" => "rogatih2017@yandex.ru",
            "password" => "qwerty",
        ]);

        DB::table("chapters")->insert([
            [
                "name" => "Электромагнетизм",
                "sentence_doc" => "19Nk8aRn3T7YUgFTt3OZaEU_A0_rmqDmC",
            ],
            [
                "name" => "Электромагнитная индукция",
                "sentence_doc" => "19Nk8aRn3T7YUgFTt3OZaEU_A0_rmqDmC",
            ]
        ]);
        DB::table("sections")->insert([
            [
                "name" => "Магнитное поле тока",
                "document" => "1sgn2eX1rlFGOX3V92PJhV2SFdGnMn33s",
                "description" => 'Тест по теме "Магнитное поле тока" и правила правой руки',
                "idChapter" => 1
            ],
            [
                "name" => "Свойства магнитного поля",
                "document" => "1g3u2HzBpKxc99gSD7jL-ZQkpCmV7F02z",
                "description" => "",
                "idChapter" => 1
            ],
            [
                "name" => "Основные характеристики магнитного поля",
                "document" => "1WtvyHv35Z02Fa54JIV4rku948R0wSNuS",
                "description" => "Что такое напряженность, магнитная индукция, магнитный поток и потокосцепление",
                "idChapter" => 1
            ],
            [
                "name" => "Намагничивание ферромагнитных материалов",
                "document" => "1w__znx6b-BeGrQr9xmxS0c1gDdjy4sxc",
                "description" => "",
                "idChapter" => 1
            ],
            [
                "name" => "Перемагничивание ферромагнетиков. Магнитный гистерезис",
                "document" => "19Nk8aRn3T7YUgFTt3OZaEU_A0_rmqDmC",
                "description" => "",
                "idChapter" => 1
            ],
//            [
//                "name" => "Упражнения по Электромагнетизму",
//                "document" => "19Nk8aRn3T7YUgFTt3OZaEU_A0_rmqDmC",
//                "description" => "",
//                "idChapter" => 1
//            ],
            [
                "name" => "Явление электромагнитной индукции",
                "document" => "1kV6Uur5j8bvftdpl0-UouUQQsD17u_o4",
                "description" => "",
                "idChapter" => 2
            ],
            [
                "name" => "Самоиндукция",
                "document" => "1OwiVO3y771aGSwcErbf2nyuBPGk_Z_P1",
                "description" => "",
                "idChapter" => 2
            ],
            [
                "name" => "Взаимоиндукция",
                "document" => "1e56Sh2hldnS8cGZ1SGn4Oj69_kfAL_c-",
                "description" => "",
                "idChapter" => 2
            ],
//            [
//                "name" => "Упражнения по Электромагнитной индукции",
//                "document" => "19Nk8aRn3T7YUgFTt3OZaEU_A0_rmqDmC",
//                "description" => "",
//                "idChapter" => 2
//            ],
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
                "question" => "И что убдет?",
                "idTypeQuestion" => 4,
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
            ],
            [
                "answers" => json_encode(
                    [
                        "right" => "qwerty",
                    ]),
                "question_id" => 2
            ],
            [
                "answers" => json_encode(
                    [
                        "right" => [
                            "qwerty",
                            "катя"
                        ],
                        "answers" => [
                            "мой любимый",
                            "werty",
                            "твой"
                        ]
                    ]),
                "question_id" => 5
            ],
            [
                "answers" => json_encode(
                    [
                        "right" => [
                            "qwerty",
                            "катя"
                        ],
                        "answers" => [
                            "мой любимый",
                            "werty",
                            "твой",
                            "машнит"
                        ]
                    ]),
                "question_id" => 6
            ],
        ]);
    }
}
