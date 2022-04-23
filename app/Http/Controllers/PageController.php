<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;
class PageController extends Controller
{
    public function home()
    {
        return view('pages.homePage');
    }

    public function  theory()
    {
        $path = public_path() . "/data/chapters.json";

        $json = File::get($path);
        $chapters = json_decode($json, true);
        return view("pages.theory", compact('chapters'));
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
