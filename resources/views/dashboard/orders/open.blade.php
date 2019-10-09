@extends('layouts.dashboard')

@section('content')

    <h1>Спасибо за покупку!</h1>
    <br>
    <ul class="list_">
        <li>Вы приобрели: {{ $order->service->title }}</li>
        <li>Продавец: <a href="{{ route('show.seller', $order->userSeller->login) }}">{{ $order->service->user->login }}</a></li>
        <li>Файл для ознакомления: <a href="{{ asset('storage/' . $order->service->file) }}">просмотреть</a></li>
        <li>Купленный товар: <a href="{{ route('download', ['file' => $order->service->product]) }}">скачать</a></li>
    </ul>

        <div class="col-xl-12">

            @if ($order->existsReview)
                <div class="dashboard-box margin-top-0">
                    <div class="content">
                        <ul class="dashboard-box-list">
                            <li>
                                <div class="boxed-list-item">

                                    <div class="item-content">
                                        <h4>Ваш отзыв</h4>
                                        <div class="item-description">
                                            <p>{{ $order->existsReview->text }}</p>
                                            <p>{{ $order->existsReview->created_at->diffForHumans() }}</p>
                                            <a href="#" id="edit" class="button ripple-effect big margin-top-30"><i class="fal fa-edit"></i> Отредактировать </a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li id="textEdit">
                                <div class="col-md-12">
                                    <form action="{{ route('order.review.edit', $order->existsReview->id) }}" method="POST">
                                        <div class="submit-field">
                                            <h5>Отредактировать отзыв</h5>
                                            <textarea  name="text">{{ $order->existsReview->text }}</textarea>
                                        </div>
                                        <button type="submit" class="button ripple-effect big"><i class="fal fa-check"></i> изменить отзыв</button>
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            @else
                <form action="{{ route('order.review', $order) }}" method="POST">
                    <div class="submit-field">
                        <h5>Оставить отзыв</h5>
                        <textarea name="text" placeholder="Оставьте отзыв о продавце"></textarea>
                    </div>

                    <div class="submit-field">
                        <button type="submit" class="button ripple-effect big"><i class="fal fa-comment-lines"></i>
                            отправить отзыв
                        </button>
                    </div>
                </form>
            @endif
        </div>

    @push('scripts')
        <script>
            var input = $('#textEdit').hide();
            var edit = $('#edit').on('click', function () {
                input.toggle();
            });
        </script>
    @endpush
@endsection