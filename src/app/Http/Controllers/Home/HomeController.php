<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Category\GetParentCategoriesHasContactPublishedAction;
use Domain\Link\Actions\Contact\GetAllContactsPublishedHasCategoryAction;
use Domain\Link\Actions\Contact\GetContactAction;
use Domain\Link\Models\Category;
use Domain\Link\Models\Contact;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category)
    {
        $contacts = GetAllContactsPublishedHasCategoryAction::execute($category);

        return view('pages.home.category', compact('contacts', 'category'));
    }

    public function contact(Contact $contact)
    {
        $contact = GetContactAction::execute($contact);

        return view('pages.home.contact', compact('contact'));
    }
}
