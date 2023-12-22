<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     return view('welcome');
// });

Auth::routes();

Route::view('/', 'welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/apply', [\App\Http\Controllers\JobController::class, 'apply'])->name('apply');

/**USER */
Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/history', [\App\Http\Controllers\User\HistoryController::class, 'history'])->name('history');
        Route::post('/delete', [\App\Http\Controllers\User\HistoryController::class, 'delete'])->name('delete');
    });
});

/**ADMIN */
Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/detail/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'detail'])->name('dashboard.detail');
        Route::delete('/dashboard/delete/{id}', [\App\Http\Controllers\Admin\DashboardController::class, 'delete'])->name('dashboard.delete');
        Route::get('/event', [\App\Http\Controllers\Admin\EventController::class, 'index'])->name('event');
        Route::get('/event/show/{id}', [\App\Http\Controllers\Admin\EventController::class, 'show'])->name('event.show');
        Route::get('/event/create', [\App\Http\Controllers\Admin\EventController::class, 'create'])->name('event.create');
        Route::post('/event/insert', [\App\Http\Controllers\Admin\EventController::class, 'insert'])->name('event.insert');
        Route::get('/event/edit/{id}', [\App\Http\Controllers\Admin\EventController::class, 'edit'])->name('event.edit');
        Route::put('/event/update{id}', [\App\Http\Controllers\Admin\EventController::class, 'update'])->name('event.update');
        Route::delete('/event/delete/{id}', [\App\Http\Controllers\Admin\EventController::class, 'delete'])->name('event.delete');
        // Route::get('/history', [\App\Http\Controllers\User\HistoryController::class, 'history'])->name('history');
        // Route::post('/delete', [\App\Http\Controllers\User\HistoryController::class, 'delete'])->name('delete');
    });
});