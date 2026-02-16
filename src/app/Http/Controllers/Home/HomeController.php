<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Category\GetParentCategoriesHasContactPublishedAction;
use Domain\Link\Actions\Contact\GetAllContactsPublishedHasCategoryAction;
use Domain\Link\Actions\Contact\GetContactAction;
use Domain\Link\Models\Category;
use Domain\Link\Models\Contact;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = GetParentCategoriesHasContactPublishedAction::execute();

        return view('pages.home.index', compact('categories'));
    }

    public function category(Category $category): View
    {
        $contacts = GetAllContactsPublishedHasCategoryAction::execute($category);

        return view('pages.home.category', compact('contacts', 'category'));
    }

    public function contact(Contact $contact): View
    {
        $contact = GetContactAction::execute($contact);

        return view('pages.home.contact', compact('contact'));
    }
}
