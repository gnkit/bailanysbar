<?php

namespace App\Http\Controllers\Link\Category;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Category\DeleteCategoryAction;
use Domain\Link\Actions\Category\GetAllParentCategoriesAction;
use Domain\Link\Actions\Category\GetAllParentCategoriesPaginationAction;
use Domain\Link\Actions\Category\UpsertCategoryAction;
use Domain\Link\DataTransferObjects\CategoryData;
use Domain\Link\Models\Category;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $rows = 10;

        $categories = GetAllParentCategoriesPaginationAction::execute($rows);

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
        try {
            DeleteCategoryAction::execute($category);

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Throwable $exception) {
            return redirect()->route('categories.index')->with('error', $exception->getMessage());
        }
    }
}
