<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Posts;

class HomeController extends Controller
{
    //
    public function index(){
        $posts = Posts::paginate(3);
        //dd($posts);
        //return view('admin.article.index')->with('posts', $posts);

        return view('front.home.index');
    }
}
