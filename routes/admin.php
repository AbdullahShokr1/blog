<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\SettingController;

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('Dashboard');
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('page', PageController::class);
    Route::resource('setting', SettingController::class);
});
Route::get('{slug}', 'App\Http\Controllers\Backend\CategoryController@show')->name('mycate');
