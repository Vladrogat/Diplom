<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $chapters = Chapter::all();
        return PageController::viewer("pages.sections.index", compact('sections', 'chapters'));
    }

    public function show(Request $request, Section $section)
    {
        return PageController::viewer("pages.sections.show", compact("section"));
    }
}
