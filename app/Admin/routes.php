<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('route.prefix'),
    'namespace'     => config('route.namespace'),
    'middleware'    => config('route.middleware'),
    'as'            => config('route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('demo/users', UserController::class);
});
