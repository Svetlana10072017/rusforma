<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,

]);


Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');//маршрут к выходу из логирования (добавляется с утсановкой auth в laravel)
//Группировка маршрутов по авторизации. Испозуем middleware(посредник) для того, чтобы web-приложение могло определить, что вы зарегистрировались. Namespace прописываем для
//определения нахождения контроллера в дериктории админ. Префикс нужен для того, чтобы не прописывать в маршруте лишний раз /admin/
Route::middleware(['auth'])->group(function () {//группировка по посреднику авторизации


    Route::group([//группирповка по авторизации без прав админки
        'prefix' => 'person',
        // 'namespace' => 'Person',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', 'App\Http\Controllers\Person\OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', '\App\Http\Controllers\Person\OrderController@show')->name('orders.show');
    });
    Route::group([//группировка по авторизации с правами админа
        // 'namespace' => 'Admin',
        'prefix' => 'admin',
    ], function () {
        Route::group(['middleware' => 'role_admin'], function () {
            Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('home');
            Route::get('/orders/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('orders.show');
            // Route::get('/reset','ResetController@reset')->name('reset');
        });

        Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
        Route::resource('images', 'App\Http\Controllers\Admin\ImageController');
        Route::resource('users', 'App\Http\Controllers\Admin\UserController');

    });
});




Route::group(['prefix'=>'basket',
], function(){
    //добавление в корзину
    Route::post('/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
    //маршрут для не пустой корзины(сначала обрабатывается не пуста ли козина в контроллере basketnotempty)
    Route::group(['middleware'=>'basket_not_empty',
], function(){
    //маршрут к корзине
Route::get('/','App\Http\Controllers\BasketController@basket')->name('basket');
//маршрут оформление заказа
Route::get('/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');

//удаление заказа
Route::post('/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
//подтверждение заказа
Route::post('/confirm', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
});



});

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories','App\Http\Controllers\MainController@categories')->name('categories');
// Route::get('/basket','App\Http\Controllers\MainController@basket')->name('basket');
// Route::get('/basket/place', 'App\Http\Controllers\MainController@basketPlace')->name('basket-place');
Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product');



