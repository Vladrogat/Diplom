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
use JetBrains\PhpStorm\NoReturn;

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
        $all_time = 0;
        /**
         * Продумать структуру помещения ответов в массив
         */
        foreach ($data as $question) {
            $questions[] = $question;
            $type = TypeQuestion::where("id", "=", $question["idTypeQuestion"])->first();
            $all_time += $type["time"];
        }
        if (empty($questions)) {
            return redirect()->route("sections.show", $section)->with(["typeError" => "Тестов поданной теме нет"]);
        }
        shuffle($questions);
        $questions = array_splice($questions, 0, 10);
        $data = [
            "time" => $all_time,
            "questions" => $questions,
            "ids" => [],
            "result" => []
        ];
        Session::put("data", $data);
        //dd($data["questions"][0]);
        return redirect()->route("question.show", [$section, $data["questions"][0]]);
    }

    public function show(Section $section, Question $question)
    {
        $data = Session::get("data");

        return PageController::viewer("pages.questions.index", compact("section", "question", "data"));
    }

    public function result(Request $request, Section $section, Question $question)
    {
        $input = $request->input("answer");
        if ($input != null) {
            $data = Session::get("data");
            $data["ids"][] = $request["id"];
            $data["ids"] = array_unique($data["ids"]);

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
        return redirect()->route("question.show", [$section, $question]);
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
