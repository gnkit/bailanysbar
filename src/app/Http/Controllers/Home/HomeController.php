<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\Contact\Models\Contact;
use Domain\Contact\Models\Category;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();

        return view('pages.home.index', compact('categories'));
    }

    public function category(Category $category)
    {
        // $categories = Category::with('children')->whereNull('parent_id')->get();
//dd($category->children);
        $contacts = [];

//        $contact = Contact::where('category_id', '=', $category->id)->get();

        foreach ($category->children as $child) {
            $contacts[] = Contact::where('category_id', '=', $child->id)->get();
//            $contacts = $contacts->merge($contacts);
        }

//        $contactss[] = $contact;

//         dd($contacts);
        // $children = $category->children;


        // dd($contact);

        // dd($contacts->category());

        return view('pages.home.category', compact('contacts', 'category'));
    }
}
