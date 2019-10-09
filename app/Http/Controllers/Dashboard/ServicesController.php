<?php

namespace App\Http\Controllers\Dashboard;

use App\Criteria\SelfServiceCriteria;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepositoryEloquent;
use App\Http\Requests\Service as ServiceRequest;
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

    public function store(ServiceRequest $request)
    {
        if ($request->createService()) {
            return redirect()->route('service.index')->with('success', 'Услуга создана');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id)
    {
        return view('dashboard.services.edit')->with([
            'service' => $this->repository->find($id),
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function update($id, ServiceRequest $request)
    {
        $request->updateService($id);

        return redirect()->route('service.index')->with('success' , 'Услуга отредактирована');
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
            return redirect()->route('service.index')->with('success' , 'Услуга удалена');
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

        return redirect()->route('service.index')->with('success' , 'Все услуги удалены');
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function removeFile($id)
    {
        $service = $this->repository->pushCriteria(SelfServiceCriteria::class)->find($id);

        if (\Storage::exists($service->file)) :
            \Storage::delete($service->file);
        endif;

       return $service->update(['file' => null,]);
    }

}
