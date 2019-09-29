<?php

namespace App\Http\Controllers\Dashboard;

use App\Criteria\SelfServiceCriteria;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * @var ServiceRepositoryEloquent
     */
    protected $repository;

    /**
     * ServicesController constructor.
     * @param ServiceRepositoryEloquent $repository
     */

    public function __construct(ServiceRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $services = $this->repository->pushCriteria(SelfServiceCriteria::class)->paginate(5);

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

    public function edit($id)
    {
        return view('dashboard.services.edit')->with([
            'service' => Service::find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $service = Service::find($id);

        $request->validate([
            'title' => ['required' , 'string' , 'max:255' , 'max:70'],
            'category_id' => ['required'],
            'amount' => ['required' , 'string'],
            'body' => ['required' , 'string'  , 'max:1000'],
        ]);

        $image = $request->hasFile('image') ? $request->file('image')->store('products' , 'public') : $service->image;

        $service->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $image,
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id,
            'amount' => (int) $request->input('amount'),
        ]);

        return redirect()->route('service.index');
    }

    public function delete($id) {
        $service = Service::find($id);
        \Storage::disk('public')->delete($service->image);
        $service->delete();
        return redirect()->route('service.index');
    }

}
