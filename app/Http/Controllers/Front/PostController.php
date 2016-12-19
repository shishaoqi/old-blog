<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Category;

class PostController extends Controller
{
    public function index($id){
        $post = Posts::with('adminUser')->find($id);
        $categorys = Category::all();
        return view('front.post.index')->with(compact('post', 'categorys'));
    }
}
