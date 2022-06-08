<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Frontend\FrontendController;

require __DIR__.'/auth.php';

//Frontend
Route::get('/',[FrontendController::class,'index'])->name('HomePage');

// Route::get('/',function (){
//     return view('frontend.home');
// })->name('HomePage');



//backend
require __DIR__ . '/admin.php';