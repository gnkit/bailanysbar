<?php

namespace Tests\Feature\Link\Category;

use Domain\Account\Models\User;
use Domain\Link\Actions\Category\GetAllParentCategoriesAction;
use Domain\Link\Actions\Category\GetAllParentCategoriesPaginationAction;
use Domain\Link\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCategoryIndex()
    {
        $user = User::factory()->create([
            'role_id' => 1,
        ]);
        $i = 1;
        $categories = GetAllParentCategoriesPaginationAction::execute(10);

        $response = $this->actingAs($user)->get(route('categories.index'));
        $this->view('pages.category.index', ['categories' => $categories, 'i' => $i]);

        $response->assertStatus(200);
    }

    public function testCategoryCreate()
    {
        $user = User::factory()->create([
            'role_id' => 1,
        ]);
        $categories = GetAllParentCategoriesAction::execute();

        $response = $this->actingAs($user)->get(route('categories.create'));
        $this->view('pages.category.create', ['categories' => $categories]);

        $response->assertStatus(200);

        $this->followingRedirects()->get(route('categories.index'))->assertStatus(200);
    }

    public function testCategoryStore()
    {
        $user = User::factory()->create([
            'role_id' => 1,
        ]);
        $request = [
            'name' => 'category',
            'name_ru' => 'category_ru',
            'name_en' => 'category_en',
            'icon' => 'fa-solid fa-money-bill',
            'parent_id' => null,
        ];
        $this->actingAs($user)->post(route('categories.store'), $request);

        $this->assertDatabaseHas('categories', [
            'name' => 'category',
            'name_ru' => 'category_ru',
            'name_en' => 'category_en',
            'icon' => 'fa-solid fa-money-bill',
            'parent_id' => null,
        ]);

        $this->followingRedirects()->get(route('categories.index'))->assertStatus(200);
    }

    public function testCategoryEdit()
    {
        $user = User::factory()->create([
            'role_id' => 1,
        ]);
        $categories = GetAllParentCategoriesAction::execute();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->get(route('categories.edit', $category));
        $this->view('pages.category.edit', ['categories' => $categories, 'category' => $category]);

        $response->assertStatus(200);
    }

    public function testCategoryUpdate()
    {
        $user = User::factory()->create([
            'role_id' => 1,
        ]);
        $request = [
            'name' => 'category',
            'name_ru' => 'category_ru',
            'name_en' => 'category_en',
            'icon' => 'fa-solid fa-money-bill',
            'parent_id' => null,
        ];
        $this->actingAs($user)->post(route('categories.store'), $request);

        $category = Category::first('id', 30);

        $this->put(route('categories.update', $category->id), [
            'name' => 'category_new',
            'name_ru' => 'category_new_ru',
            'name_en' => 'category_new_en',
            'icon' => 'fa-solid fa-money-bill',
            'parent_id' => null,
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'category_new',
            'name_ru' => 'category_new_ru',
            'name_en' => 'category_new_en',
            'icon' => 'fa-solid fa-money-bill',
            'parent_id' => null,
        ]);

        $this->followingRedirects()->get(route('categories.index'))->assertStatus(200);
    }

    public function testCategoryDestroy()
    {
        $user = User::factory()->create([
            'role_id' => 1,
        ]);
        $category = Category::factory()->create([
            'id' => 100,
        ]);

        $this->assertDatabaseHas('categories', [
            'id' => 100,
        ]);

        $this->actingAs($user)->delete(route('categories.destroy', $category));

        $this->assertDatabaseMissing('categories', [
            'id' => 100,
        ]);

        $this->followingRedirects()->get(route('categories.index'))->assertStatus(200);
    }
}
