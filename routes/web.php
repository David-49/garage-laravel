<?php

use App\Http\Middleware\IsAdmin;
use \App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AnnouncementController;
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
Auth::routes();

Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');



Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'annonce'], function() {
    Route::get('/', [AnnouncementController::class, 'listAnnouncement'])->name('list.announcement');
    Route::get('/details/{id}', [AnnouncementController::class, 'showAnnouncement'])->name('show.announcement');
    Route::get('/edition/{id}', [AnnouncementController::class, 'editAnnouncement'])->name('edit.announcement');
    Route::put('/edition/{id}', [AnnouncementController::class, 'updateAnnouncement'])->name('update.announcement');
    Route::delete('/supp/{id}', [AnnouncementController::class, 'deleteAnnouncement'])->name('announcement.delete');
    Route::post('/details/{id}/commentaire', [CommentController::class, 'addComment'])->name('add.comment');
});
    Route::group(['prefix' => 'user'], function () {
        Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
        Route::get('/settings/annonce/create', [AnnouncementController::class, 'createAnnouncement'])->name('user.settings.create.announcement');
        Route::post('/settings/annonce', [AnnouncementController::class, 'storeAnnouncement'])->name('user.settings.store.announcement');
        Route::put('/settings/money', [UserController::class, 'addMoney'])->name('user.add.money');
        Route::get('/reservations', [UserController::class, 'reservations'])->name('user.show.reservations');
    });
    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/{id}/reserved', [VehicleController::class, 'reserved'])->name('vehicles.reserved');
        Route::post('/{vehicle}/reserved', [VehicleController::class, 'storeReserved'])->name('vehicules.reserved.store');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => [IsAdmin::class]], function () {
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles',[Admin\VehicleController::class, 'index'])->name('admin.vehicle.index');
    Route::get('/vehicles/{id}',[Admin\VehicleController::class, 'show'])->name('admin.vehicle.show');
    Route::put('/vehicles/{id}',[Admin\VehicleController::class, 'update'])->name('admin.vehicle.update');
});
