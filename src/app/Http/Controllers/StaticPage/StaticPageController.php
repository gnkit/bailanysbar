<?php

namespace App\Http\Controllers\StaticPage;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class StaticPageController extends Controller
{
    /**
     * @return View
     */
    public function about(): View
    {
        return view('pages.static.about');
    }

    /**
     * @return View
     */
    public function pricing(): View
    {
        return view('pages.static.pricing');
    }

    /**
     * @return View
     */
    public function guide(): View
    {
        return view('pages.static.guide');
    }

    /**
     * @return View
     */
    public function privacy(): View
    {
        return view('pages.static.privacy');
    }

}
