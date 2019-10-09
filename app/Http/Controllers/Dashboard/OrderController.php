<?php

namespace App\Http\Controllers\Dashboard;

use App\Criteria\OrderCriteria;
use App\Criteria\OrderSellerCriteria;
use App\Models\Order;
use App\Models\Review;
use App\Models\Service\Service;
use App\Models\User;
use App\Repositories\Order\OrderRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $repository;

    public function __construct(OrderRepositoryEloquent $repositoryEloquent)
    {
        $this->repository = $repositoryEloquent;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function order($id)
    {
        $service = Service::find($id);

        if (auth()->user()->balance <= $service->amount) {
            return redirect()->back()->withToastError('Недостаточно средств');
        }

        $order = Order::create([
            'user_buy' => auth()->user()->id,
            'user_seller' => $service->user_id,
            'service_id' => $service->id,
        ]);

        $service->user->increment('balance', $service->amount);

        auth()->user()->decrement('balance', $service->amount);

        return redirect()->route('order.buy.complete', $order->id);
    }

    /**
     * @param $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function openOrder($order)
    {
        $order = $this->repository->pushCriteria(OrderCriteria::class)->find($order);

        return view('dashboard.orders.open', compact('order'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function listsOrderBuyed()
    {
        $orders = $this->repository->pushCriteria(OrderCriteria::class)->paginate(5);

        return view('dashboard.orders.orders_buyed', compact('orders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function listsOrderSeller()
    {
        $orders =  $this->repository->pushCriteria(OrderSellerCriteria::class)->paginate(5);

        return view('dashboard.orders.orders_seller', compact('orders'));
    }

}
