@extends('layouts.dashboard')

@section('content')

    <h1>Спасибо за покупку!</h1>
    <br>
    <ul class="list_">
        <li>Вы приобрели: {{ $order->service->title }}</li>
        <li>Продавец: {{ $order->service->user->login }}</li>
        <li>Рейтинг продавца: {{ $order->service->user->rating }}</li>
        <li>Файл для ознакомления: <a href="{{ asset('storage/' . $order->service->file) }}">просмотреть</a></li>
        <li>Купленный товар: <a href="{{ route('download', ['file' => $order->service->product]) }}">скачать</a></li>
    </ul>

    <form action="{{ route('order.review', $order) }}" method="POST">
        <div class="col-xl-12">

            <div class="submit-field">
                <h5>Оставить отзыв</h5>
                <textarea name="text" placeholder="Оставьте отзыв о продавце"></textarea>
            </div>

            <div class="submit-field">
                <button type="submit" class="button ripple-effect big"><i class="fal fa-comment-lines"></i> отправить отзыв </button>
            </div>


        </div>
    </form>
@endsection