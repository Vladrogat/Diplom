<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Question;
use App\Models\Section;
use App\Models\TypeQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
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
        $data = Question::where("idSection", "=", $section->getKey())->get();
        $questions = [];
        $varieble = [];
        $all_time = 0;
        /**
         * Формирование массива хранения данных теста
         */
        foreach ($data as $question) {

            $questions[] = $question;
            $type = TypeQuestion::where("id", "=", $question["idTypeQuestion"])->first();
            $all_time += $type["time"];

            try {
                $answers = json_decode($question->answers->answers, true);
            } catch (\Exception $e) {}

            if (!empty($answers)) {
                $var = [];
                if ($answers["answers"]) {
                    shuffle($answers["answers"]);
                    $var = array_splice($answers["answers"], 0, 3);
                }
                $var[] = $answers["right"];
                $varieble[$question["id"]] = array_unique($var);
            }
        }
        if (empty($questions)) {
            return redirect()->route("sections.show", $section)->with(["typeError" => "Тестов поданной теме нет"]);
        }
        shuffle($questions);
        $questions = array_splice($questions, 0, 10);
        //$questions = array_merge($questions, $questions, $questions);
        $data = [
            "time" => $all_time,
            "questions" => $questions,
            "vars" => $varieble,
            "result" => []
        ];
        Session::put("data", $data);
        //dd($data["questions"][0]);
        return redirect()->route("question.show", $section);
    }

    public function show(Section $section)
    {
        $data = Session::get("data");
        //dd($data);
        return PageController::viewer("pages.questions.index", compact("section", "data"));

    }

    public function result(Request $request, Section $section)
    {
        dd($request);
        if ($input != null) {
            $data = Session::get("data");
            $thisQuestion = Question::find($request["id"])->first();
            $answers = json_decode($thisQuestion->answers->answers, true);
            $result =  $data["result"];
            /*
             * запись ответа в сессию
             */
            $res = [ "answer" => $input, "right" => false];
            if ($answers["right"] == $input) {
                $res["right"] = true;
            }
            $result[$request["id"]] = $res;
            $data["result"] = $result;
            Session::put("data", $data);
        }
        //return redirect()->route("question.show", $section);
    }

    public function update(Request $request)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
