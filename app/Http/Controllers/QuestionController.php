<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Chapter;
use App\Models\Question;
use App\Models\Result;
use App\Models\Section;
use App\Models\TypeQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{

    /**
     * Получение вопросов по данному разделу
     *
     * @param Section $section
     * @return RedirectResponse
     */
    public function index(Section $section)
    {
        $data_questions = Question::where("idSection", "=", $section->getKey())->get();
        $questions = [];
        $varieble = [];
        $all_time = 0;
        /**
         * Формирование массива хранения данных теста
         */
        foreach ($data_questions as $question) {
            $questions[$question["id"]] = $question;
            /*
             * Получение типа вопроса и времени
             */
            $type = TypeQuestion::where("id", "=", $question["idTypeQuestion"])->first();
            $all_time += $type["time"];
            $answers = null;
            /*
             * Получение вариантов вопроса
             */
            try {
                $answers = json_decode($question->answers->answers, true);
            } catch (\Exception $e) {}
            if (!empty($answers)) {
                /*
                 * Формирование массива вариантов вопроса
                 */
                $var = [];
                if ( is_array($answers["right"])) {
                    $var = array_merge($var, $answers["right"]);
                } else {
                    $var[] = $answers["right"];
                }
                if (!empty($answers["answers"])) {
                    shuffle($answers["answers"]);
                    $var = array_merge($var, array_splice($answers["answers"], 0, 4 - count($var)));
                }
                try {
                    shuffle($var);
                    $varieble[$question["id"]] = array_unique($var);
                } catch (\Exception $x) {
                    dd($var);
                }
            }

        }
        if (empty($questions)) {
            return redirect()->route("sections.show", $section)->with(["typeError" => "Тестов поданной теме нет"]);
        }
        shuffle($questions);
        $questions = array_splice($questions, 0, 10);
        $data = [
            "time" => $all_time,
            "questions" => $questions,
            "vars" => $varieble,
        ];
        Session::put("data", $data);

        return redirect()->route("question.show", $section);
    }

    public function show(Section $section)
    {
        /*
         * Получение данных
         * */
        $data = Session::get("data");
        return PageController::viewer("pages.questions.index", compact("section", "data"));
    }

    public function result(Request $request, Section $section)
    {
        $points = 0;
        $answers = $request["answers"];
        $data = Session::get("data");
        if (!empty($answers)) {
            foreach ( $data["questions"] as $question) {
                $right = '';
                if (key_exists($question["id"], $answers)) {
                    try {
                        $right = json_decode($question->answers->answers, true)["right"];
                    } catch (\Exception $e) {}
                    // множетвенный ответ
                    if (is_array($answers[$question["id"]])) {
                        // получение цености кажого варианта
                        $score = 1 / count($right);
                        foreach ($answers[$question["id"]] as $answer) {
                            if (in_array($answer, $right)) {
                                unset($right[array_search($answer,$right)]);
                                $points += $score;
                            } else {
                                $points -= $score;
                            }
                        }
                        if ($points < 0 ) {
                            $points = 0;
                        }
                    } else {

                        if ($answers[$question["id"]] == $right) {
                            $points++;
                        }
                    }
                }
            }
        }
        /*
         * Оценивание
         */
        $percent = $points * 100 / count($data["questions"]);
        $grade = 2;
        if ($percent >= 50 && $percent < 60) {
            $grade = 3;
        } elseif ($percent >= 70 && $percent < 80 ) {
            $grade = 4;
        } elseif ($percent >= 90 && $percent < 100 ) {
            $grade = 5;
        }
        /*
         * Запись результата в бд
         */
        $result = Result::where("user_id", "=", Auth::id())->where("section_id", "=", $section["id"]);
        if ($result->first()) {
            $result->update([
                "time" => $request["time"],
                "points" => $points . " / " . count($data["questions"]),
                "grade" => $grade,
                "result" => json_encode([
                    "options" => $data["vars"],
                    "answers" => $answers,
                ])
            ]);
        } else {
            Result::factory(1)->create([
                "user_id" => Auth::id(),
                "section_id" => $section["id"],
                "time" => $request["time"],
                "points" => $points,
                "grade" => $grade,
                "result" => json_encode([
                    "options" => $data["vars"],
                    "answers" => $answers,
                ]),
            ]);
        }
        return redirect(route("profile", Auth::user()));
    }
}
