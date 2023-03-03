<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Domain\Link\Models\Contact;
use Domain\Link\Models\Category;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::where('parent_id', '=', null)->get();
//         $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('pages.home.index', compact('categories'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category)
    {
        $contacts = [];
        if ($category->children()->count() > 0) {
            foreach ($category->children as $child) {
                $contacts[] = Contact::where('category_id', '=', $child->id)->get();
            }
        } else {
            $contacts[] = Contact::where('category_id', '=', $category->id)->get();
        }

        return view('pages.home.category', compact('contacts', 'category'));
    }
}
