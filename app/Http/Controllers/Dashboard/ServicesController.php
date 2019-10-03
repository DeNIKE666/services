<?php

namespace App\Http\Controllers\Dashboard;

use App\Criteria\SelfServiceCriteria;
use App\Models\Category;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Http\FileHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index()
    {
        $services = $this->repository->pushCriteria(SelfServiceCriteria::class)->paginate(5);

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'string'  , 'max:70'],
            'short' => ['required' , 'string' , 'max:100'],
            'category_id' => ['required'],
            'amount' => ['required' , 'integer'],
            'body' => ['required' , 'string'  , 'max:2000'],
        ]);

        $image = null;
        $file = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName =  'image_' .uniqid() . '_' . $file->getClientOriginalName();
            $image =  $request->file('image')->storeAs('services', $fileName, 'public');
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName =  'file_' .uniqid() . '_' . $file->getClientOriginalName();
            $file =  $request->file('file')->storeAs('files', $fileName, 'public');
        }

        Service::create([
            'title' => $request->input('title'),
            'short' => $request->input('short'),
            'body' => $request->input('body'),
            'image' => $image,
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->user()->id,
            'amount' => (int) $request->input('amount'),
            'file' => $file,
        ]);

        return redirect()->route('service.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Service $service,$id)
    {
        return view('dashboard.services.edit')->with([
            'service' => Service::find($id),
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function update($id, Request $request)
    {
        $service = $this->repository->pushCriteria(SelfServiceCriteria::class)->find($id);

        $request->validate([
            'title' => ['required' , 'string' , 'max:70'],
            'short' => ['required' , 'string' , 'max:100'],
            'category_id' => ['required'],
            'amount' => ['required' , 'string'],
            'body' => ['required' , 'string'  , 'max:2000'],
        ]);

        $imageCurrent = $service->image;

        $fileCurrent = $service->file;

        if ($request->hasFile('image')) {
            $this->repository->prevDeleteFile($imageCurrent);
            $file = $request->file('image');
            $fileName =  'image_' .uniqid() . '_' . $file->getClientOriginalName();
            $imageCurrent =  $request->file('image')->storeAs('services', $fileName, 'public');
        }

        if ($request->hasFile('file')) {
            $this->repository->prevDeleteFile($fileCurrent);
            $file = $request->file('file');
            $fileName =  'file_' .uniqid() . '_' . $file->getClientOriginalName();
            $fileCurrent =  $request->file('file')->storeAs('files', $fileName, 'public');
        }

        $update = $service->update([
            'title' => $request->input('title'),
            'short' => $request->input('short'),
            'body' => $request->input('body'),
            'image' => $imageCurrent,
            'category_id' => $request->input('category_id'),
            'amount' => (int) $request->input('amount'),
            'file' => $fileCurrent,
        ]);

        return redirect()->route('service.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function delete($id)
    {
        $service = $this->repository->pushCriteria(SelfServiceCriteria::class)->find($id);

        if ($this->repository->serviceFind($service)->dropFiles()->deleteService()) {
            return redirect()->route('service.index');
        };
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function deletes()
    {
        $this->repository->pushCriteria(SelfServiceCriteria::class)->all()->each(function ($service) {
            $this->repository->serviceFind($service)->dropFiles()->deleteService();
        });

        return redirect()->route('service.index');
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function removeFile($id)
    {
        $service = $this->repository->pushCriteria(SelfServiceCriteria::class)->find($id);

        if (\Storage::disk('public')->exists($service->file)) :
            \Storage::disk('public')->delete($service->file);
        endif;

       return $service->update(['file' => null,]);
    }

}
