@extends('layouts.dashboard')

@section('content')
    <ul class="list_">
        <li>Вы выбрали услугу: {{ $service->title }}</li>
        <li>Категория: <b>{{ mb_strtolower($service->categories->title ) }}</b></li>
        <li>Продавец: <a href="{{ route('show.seller', $service->user->login) }}">{{ $service->user->login }}</a></li>
        <li>Файл для ознакомления: <a href="{{ asset('storage/' . $service->file) }}">просмотреть</a></li>
    </ul>

    <hr>


    <div id="chat">
        <chat-component :user="{{ auth()->user() }}" :seller="{{ $service }}"></chat-component>
    </div>

@endsection
