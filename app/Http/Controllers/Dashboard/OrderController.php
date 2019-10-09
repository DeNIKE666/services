<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use App\Models\Review;
use App\Models\Service\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function openOrder($order)
    {
        $order = Order::find($order);

        return view('dashboard.orders.open', compact('order'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function listsOrderBuyed()
    {
        $orders = Order::where('user_buy', auth()->user()->id)
            ->orderBy('created_at' , 'desc')->paginate(10);
        return view('dashboard.orders.orders_buyed', compact('orders'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function listsOrderSeller()
    {
        $orders = Order::where('user_seller', auth()->user()->id)
            ->orderBy('created_at' , 'desc')->paginate(10);
        return view('dashboard.orders.orders_seller', compact('orders'));
    }

}
