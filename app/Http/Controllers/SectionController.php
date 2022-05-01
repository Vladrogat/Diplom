<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return PageController::viewer("pages.sections.index", compact('sections'));
    }
    public function show(Request $request, Section $section)
    {

    }
}
