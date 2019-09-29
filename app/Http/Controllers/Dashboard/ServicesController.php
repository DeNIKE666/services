<?php

namespace App\Http\Controllers\Dashboard;

use App\Criteria\SelfServiceCriteria;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Prettus\Repository\Traits\CacheableRepository;


class ServicesController extends Controller
{
    protected $repository;

    public function __construct(ServiceRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $services = $this->repository->pushCriteria(SelfServiceCriteria::class)->paginate();

        return view('dashboard.services.index')->with([
            'services' => $services,
        ]);
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'string' , 'max:255' , 'max:70'],
            'category_id' => ['required'],
            'amount' => ['required' , 'integer'],
            'body' => ['required' , 'string'  , 'max:1000'],
            'image' => ['required' , '']
        ]);

        $imageUpload = $request->hasFile('image') ?
                       $request->file('image')->store('products' , 'public') : null;

        Service::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $imageUpload,
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id,
            'amount' => $request->input('amount'),
        ]);

        return redirect()->route('service.index');
    }


    public function show(Services $services)
    {
        //
    }


    public function edit(Services $services)
    {
        //
    }

    public function update(Request $request, Services $services)
    {
        //
    }

    public function destroy(Services $services)
    {
        //
    }
}
