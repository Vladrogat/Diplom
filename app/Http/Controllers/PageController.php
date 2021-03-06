<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Section;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Метод для передачи аутентифицированного пользователя в представление
     * @param string $view
     * @param array $data
     * @return Application|Factory|View
     */
    public static function viewer(string $view = "", array $data = []): View|Factory|Application
    {
        $user = Auth::user();
        $typeError = Session::get("typeError", "");
        $data["user"] = $user;
        $data["typeError"] = $typeError;
        return view($view, $data);
    }

    /**
     * Метод перехода на главную страницу
     * @return Application|Factory|View
     */
    public function home(): View|Factory|Application
    {
        return self::viewer('pages.homePage');
    }

    /**
     * Метод перехода на страницу с теорией
     * @return Application|Factory|View
     */
    public function  theory(): View|Factory|Application
    {
        $chapters_data = Chapter::all();
        $chapters = $this->getChapters($chapters_data);
        return self::viewer("pages.theory", compact('chapters'));
    }

    /**
     * Метод возращающий ассоциативный массив с днными о разделе 
     * @param array $chapters_data
     * @return Array
     */
    private function getChapters($chapters_data)
    {
        $mass = [];
        foreach ($chapters_data as $chapter) {
            $mass[$chapter["id"]]["name"] = $chapter["name"];

            $mass[$chapter["id"]]["sentences"] = [
                "name" =>  'Упражнения по "' . $chapter["name"] . '"',
                "document" => $chapter["sentence_doc"]
            ];

            $sections = Section::where("idChapter", $chapter["id"])->get();
            foreach ($sections as $section) {
                $mass[$chapter["id"]]["sections"][] = [
                    "name" => $section["name"],
                    "document" => $section["document"]
                ];
            }
        }
        return $mass;
    }
}
