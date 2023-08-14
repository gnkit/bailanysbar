<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Category\GetParentCategoriesHasContactPublishedAction;
use Domain\Link\Actions\Contact\GetAllContactsPublishedHasCategoryAction;
use Domain\Link\Models\Category;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = GetParentCategoriesHasContactPublishedAction::execute();

        return view('pages.home.index', compact('categories'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category)
    {
        $contacts = GetAllContactsPublishedHasCategoryAction::execute($category);

        return view('pages.home.category', compact('contacts', 'category'));
    }
}
