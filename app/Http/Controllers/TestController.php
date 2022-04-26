<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
class TestController extends Controller
{
    public function index()
    {
        return PageController::viewer("pages.tests.index");
    }
    public function show()
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
    public function update(Request $request)
    {

    }

}
