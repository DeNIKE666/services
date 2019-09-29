<?php

Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Главная', route('admin.index'));
});

// Home > About
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('admin');
    $trail->push('Категории', route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('categories');
    $trail->push('Создание категории', route('categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push('Редактирование категории', route('categories.edit', $category));
});

Breadcrumbs::for('frontend', function ($trail) {
    $trail->push('Главная', route('frontend.index'));
});

Breadcrumbs::for('user.sell', function ($trail , $request) {
    $trail->parent('frontend');
    $trail->push('Просмотр услуги пользователя', route('user.sell' , ['id' => $request->id , 'productId' => $request->productId]));
});


Breadcrumbs::for('login', function ($trail) {
    $trail->parent('frontend');
    $trail->push('Авторизация', route('login'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->parent('frontend');
    $trail->push('Регистрация', route('register'));
});

// Dashboard

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Личный кабинет', route('dashboard'));
});

Breadcrumbs::for('panel', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Панель', route('dashboard'));
});

Breadcrumbs::for('service', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Услуги', route('service.index'));
});

Breadcrumbs::for('create', function ($trail) {
    $trail->parent('service');
    $trail->push('Добавление услуги', route('service.create'));
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Профиль', route('profile'));
});





