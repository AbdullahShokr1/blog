<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.home',[
            'categories'=> Category::get(),
            'posts' => Post::latest()->take(12)->get(),
            'best_posts' => Post::inRandomOrder()->limit(12)->get(),
        ]);
    }
}
