<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PageController;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function show(Chapter $chapter)
    {
        return PageController::viewer("pages.chapters.show", compact("chapter"));
    }
}
