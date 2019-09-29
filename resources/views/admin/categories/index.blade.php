@extends('layouts.admin')

@section('breadcrumbs', Breadcrumbs::render('admin'))

@section('content')
    <div class="page-inner mt--2">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.categories.categories', ['list' => true])
            </div>
        </div>
    </div>
@endsection
