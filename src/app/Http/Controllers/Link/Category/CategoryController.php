<?php

namespace App\Http\Controllers\Link\Category;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Category\DeleteCategoryAction;
use Domain\Link\Actions\Category\GetAllParentCategoriesAction;
use Domain\Link\Actions\Category\GetAllParentCategoriesPaginationAction;
use Domain\Link\Actions\Category\UpsertCategoryAction;
use Domain\Link\DataTransferObjects\CategoryData;
use Domain\Link\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class CategoryController extends Controller
{
    public function index(): View
    {
        $rows = 10;

        $categories = GetAllParentCategoriesPaginationAction::execute($rows);

        return view('pages.category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $rows
            );
    }

    public function create(): View
    {
        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.category.create', compact('categories'));
    }

    public function store(CategoryData $data): RedirectResponse
    {
        UpsertCategoryAction::execute($data);

        return redirect()->route('categories.index')->with('success', __('messages.created_successfully'))->withInput();
    }

    public function edit(Category $category): View
    {
        $categories = GetAllParentCategoriesAction::execute();

        return view('pages.category.edit', compact('categories', 'category'));
    }

    public function update(CategoryData $data): RedirectResponse
    {
        UpsertCategoryAction::execute($data);

        return redirect()->route('categories.index')->with('success', __('messages.updated_successfully'))->withInput();
    }

    public function destroy(Category $category): RedirectResponse
    {
        try {
            DeleteCategoryAction::execute($category);

            return redirect()->route('categories.index')->with('success', __('messages.deleted_successfully'));
        } catch (Throwable $exception) {
            return redirect()->route('categories.index')->with('error', $exception->getMessage());
        }
    }
}
