<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard',['posts'=> Post::get()]);
    }
}
