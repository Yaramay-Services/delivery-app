<?php
use Illuminate\Support\Facades\Route;
use Modules\WebApp\Http\Controllers\WebAppController;
use Modules\WebApp\Http\Livewire\MenuLivewire;
use Modules\WebApp\Http\Livewire\RestaurantLivewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('webapp')->group(function() {
    Route::get('/', [WebAppController::class, 'index'])->name('webapp');
    Route::get('/restuarants', RestaurantLivewire::class)->name('restaurants');
    Route::get('/menu', MenuLivewire::class)->name('menu');
});
