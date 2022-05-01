<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\File;
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
        $data["user"] = $user;
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
        $path = public_path() . "/data/chapters.json";
        $json = File::get($path);
        $chapters = json_decode($json, true);
        return self::viewer("pages.theory", compact('chapters'));
    }

}
