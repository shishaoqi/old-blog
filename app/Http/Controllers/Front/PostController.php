<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Posts;

class PostController extends Controller
{
    public function index($id){
        $post = Posts::find($id);
        return view('front.post.index')->with(compact($post));
    }
}
