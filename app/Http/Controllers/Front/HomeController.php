<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Posts;
use App\Models\Category;

class HomeController extends Controller
{
    //
    public function index(){
        //$user = Auth::guard()->user();
        //dump($user);
        $posts = Posts::with('tag', 'category', 'adminUser')->paginate(3);
        $categorys = Category::all();

        /*$postsArr = $posts->toarray();
        $tags = $postsArr['data'];*/

        //$articles = Posts::where('status',config('admin.global.status.active'))->orderBy('created_at','desc')->paginate(config('admin.global.paginate'));

        return view('front.home.index')->with(compact('posts', 'categorys'));
    }
}
