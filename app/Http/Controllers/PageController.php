<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\File;
class PageController extends Controller
{
    /**
     * Метод для передачи аутентифицированного пользователя в представление
     * @param string $view
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public static function viewer($view = "", $data = [])
    {
        $user = Auth::user();
        $data["user"] = $user;
        return view($view, $data);
    }

    /**
     * Метод перехода на главную страницу
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
    {
        return self::viewer('pages.homePage');
    }

    /**
     * Метод перехода на страницу с теорией
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function  theory()
    {
        $path = public_path() . "/data/chapters.json";
        $json = File::get($path);
        $chapters = json_decode($json, true);
        return self::viewer("pages.theory", compact('chapters'));
    }

}
