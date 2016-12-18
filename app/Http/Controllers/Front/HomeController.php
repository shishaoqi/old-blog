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
        $posts = Posts::with('tag', 'category')->paginate(3);//->toArray() test()->
        //dd($posts);
        //dd($posts->toarray());
        $postsArr = $posts->toarray();
        //dd($postsArr);
        $tags = $postsArr['data'];
        //dd($tags);

        //$articles = Posts::where('status',config('admin.global.status.active'))->orderBy('created_at','desc')->paginate(config('admin.global.paginate'));
        //dd($posts);
        //return view('admin.article.index')->with('posts', $posts);

        return view('front.home.index')->with(compact('posts'));
    }
}
