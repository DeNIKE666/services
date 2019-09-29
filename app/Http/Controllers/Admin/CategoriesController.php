<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Cache\Console\CacheTableCommand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get()->toTree();

        return view('admin.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::get()->toTree();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show(Category $categories)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::get()->toTree();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id)->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function removeAll() {
        $categories = \DB::table('categories')->delete();
        return redirect()->route('categories.index');
    }

    public function remove($id) {
        $category = Category::find($id)->delete();
        return redirect()->route('categories.index');
    }

    public function up($id) {
        $category = Category::find($id)->up();
        return redirect()->route('categories.index');
    }

    public function down($id) {
        $category = Category::find($id)->down();
        return redirect()->route('categories.index');
    }

}
