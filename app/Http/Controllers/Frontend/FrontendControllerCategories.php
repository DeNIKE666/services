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

    public function show($id = null, Request $request)
    {

        $categories = Category::with('descendants')->pluck('id');

        $ids = Category::descendantsOf($id)->pluck('id');

        if ($id == null) {
            $services = Service::whereIn('category_id', $categories)->paginate(10);
        } else {

            $services = $this->repository->scopeQuery(function ($query) use ($ids, $id, $categories) {
                return $query->whereIn('category_id', $ids)
                    ->orWhere('category_id', $id)->orderBy('updated_at', 'desc');
            })->paginate(10);
        }

        return view('frontend.pages.categories')->with([
            'services' => $services,
            'categories' => Category::defaultOrder()->get()->toTree(),
        ]);
    }
}
