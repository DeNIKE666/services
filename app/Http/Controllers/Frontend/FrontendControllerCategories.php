<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendControllerCategories extends Controller
{
    protected $repository;

    public function __construct(ServiceRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Показ продуктов по выбранной категории
     * если нет то показывает все товары главной категории и ее подкатегорий
     */

    public function show($id, Request $request)
    {
        $categories = Category::defaultOrder()->get()->toTree();

        $ids = Category::descendantsOf($id)->pluck('id');

        $services =$this->repository->scopeQuery(function ($query) use ($ids, $id) {
            return $query->whereIn('category_id', $ids)->orWhere('category_id', $id);
        })->paginate();

        return view('frontend.pages.categories')->with([
            'services' => $services,
            'categories' => $categories,
        ]);
    }
}
