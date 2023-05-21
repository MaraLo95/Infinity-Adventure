<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Admin\Controllers\Admin\ProductController;
use App\Admin\Controllers\Admin\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages/welcome');
})->name('welcome');
Route::get('/register', function () {
    return view('pages/register');
})->name('register');
Route::get('/login', function () {
    return view('pages/login');
})->name('login');
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', function () {
    return view('pages/home');
})->name('home');
Route::get('/services', [App\Http\Controllers\Admin\ProductController::class,'indexUser']);
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
});
Route::get('/Sessionset', [App\Http\Controllers\SessionController::class,'set']);
Route::get('/Sessionget', [App\Http\Controllers\SessionController::class,'get']);
Route::get('/Sessiondelete', [App\Http\Controllers\SessionController::class,'delete']);
Route::get('view-offer/{id}' ,[App\Http\Controllers\Admin\OfferController::class, 'viewOne']);

Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',function () {
        return view('admin.dashboard');
    });
    
   
    Route::get('/adminUser',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('delete-user/{id}' ,[App\Http\Controllers\Admin\UserController::class, 'deleteUser']);
    Route::get('/addServices',[App\Http\Controllers\Admin\ProductController::class,'addServices']);
    Route::post('/insert-product',[App\Http\Controllers\Admin\ProductController::class,'insert']);
    Route::get('/adminGallery',[App\Http\Controllers\Admin\ProductController::class,'adminGallery']);
    Route::get('/adminServices',[App\Http\Controllers\Admin\ProductController::class,'index']);
    Route::get('delete-product/{id}' ,[App\Http\Controllers\Admin\ProductController::class, 'deleteProduct']);
    Route::get('/adminProfile/{id}' ,[App\Http\Controllers\Admin\UserController::class, 'viewAdmin']);
    Route::get('/adminProizvodi',[App\Http\Controllers\Admin\ProizvodController::class,'index']);
    Route::get('/addProizvod',[App\Http\Controllers\Admin\ProizvodController::class,'add']);
    Route::post('/insert-proizvod',[App\Http\Controllers\Admin\ProizvodController::class,'insert']);
    Route::get('delete-proizvod/{id}' ,[App\Http\Controllers\Admin\ProizvodController::class, 'delete']);
    Route::get('adminOffer' ,[App\Http\Controllers\Admin\OfferController::class, 'index']);
    Route::get('/addOffer',[App\Http\Controllers\Admin\OfferController::class,'add']);
    Route::post('/insert-offer',[App\Http\Controllers\Admin\OfferController::class,'insert']);
    Route::get('delete-offer/{id}' ,[App\Http\Controllers\Admin\OfferController::class, 'delete']);
    
});