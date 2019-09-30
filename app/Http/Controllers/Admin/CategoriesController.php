<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AttachRequestData;
use App\Http\Requests\Categories;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get()->toTree();

        return view('admin.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        $categories = Category::get()->toTree();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function show(Category $categories)
    {
        //
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Category $category)
    {
        $categories = Category::get()->toTree();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function removeAll(Category $category) {

        $category->all()->each(function ($category) {
            $category->delete();
        });

        return redirect()->route('categories.index');
    }

    /**\
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function remove($id) {

        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function up($id) {

        $category = Category::find($id)->up();

        return redirect()->route('categories.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function down($id) {

        $category = Category::find($id)->down();

        return redirect()->route('categories.index');
    }

}
