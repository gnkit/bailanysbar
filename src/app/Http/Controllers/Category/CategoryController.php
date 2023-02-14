<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Domain\Contact\Actions\Category\DeleteCategoryAction;
use Domain\Contact\Actions\Category\GetAllParentCategoriesAction;
use Domain\Contact\Actions\Category\GetParentCategoriesPaginationAction;
use Domain\Contact\Actions\Category\UpsertCategoryAction;
use Domain\Contact\DataTransferObjects\CategoryData;
use Domain\Contact\Models\Category;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 10;

        $categories = GetParentCategoriesPaginationAction::execute($rows);

        return view('pages.category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.category.create', compact('categories'));
    }

    /**
     * @param CategoryData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryData $data)
    {
        UpsertCategoryAction::execute($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.')->withInput();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.category.edit', compact('categories', 'category'));
    }

    /**
     * @param CategoryData $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryData $data)
    {
        UpsertCategoryAction::execute($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.')->withInput();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        DeleteCategoryAction::execute($category);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
