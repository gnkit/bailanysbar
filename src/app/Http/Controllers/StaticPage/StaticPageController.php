<?php

namespace App\Http\Controllers\StaticPage;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class StaticPageController extends Controller
{
    public function about(): View
    {
        return view('pages.static.about');
    }

    public function pricing(): View
    {
        return view('pages.static.pricing');
    }

    public function guide(): View
    {
        return view('pages.static.guide');
    }

    public function privacy(): View
    {
        return view('pages.static.privacy');
    }

    public function sale(): View
    {
        return view('pages.static.sale');
    }
}
