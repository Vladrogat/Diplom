<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\File;
class PageController extends Controller
{
    /**
     * Метод перехода на главную страницу
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function home()
    {
        $user = Auth::user();
        return view('pages.homePage', compact("user"));
    }

    /**
     * Метод перехода на страницу с теорией
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function  theory()
    {
        $user = Auth::user();

        $path = public_path() . "/data/chapters.json";
        $json = File::get($path);
        $chapters = json_decode($json, true);
        return view("pages.theory", compact('chapters', 'user'));
    }

    public function add()
    {
        $path = public_path() . "/data/chapters.json";
        $json = File::get($path);
        $chapters = json_decode($json, true);

        $name = "";
        $slug = "";

        File::put($path, json_encode($chapters));
        return redirect(view("pages.theory", compact('chapters')));
    }
}
