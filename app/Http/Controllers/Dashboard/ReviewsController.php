<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function create(Request $request, $id)
    {

        $order = Order::find($id);

        if ($order->existsReview()->first()) :
            return redirect()->back()->with('error', 'Вы уже оставляли отзыв к этому заказу');
        endif;

        $review = Review::create([
            'order_id' => $order->id,
            'seller_id' => $order->service->user->id,
            'user_id' => auth()->user()->id,
            'text' => $request->input('text'),
        ]);

        return redirect()->back()->with('success', 'Отзыв отправлен');
    }

    public function edit(Request $request, $id)
    {

       $review = Review::find($id);

       $review->update([
            'text' => $request->input('text'),
        ]);

        return redirect()->back()->with('success', 'Отзыв отредактирован');
    }
}
