<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Models\Posts;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(2);
        return view('admin.article.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Auth::guard('admin')->user();
        $cateList = Category::all()->toArray();
        $cateList = listToTree($cateList);
        //dd($cateList);
        return view('admin.article.addArticle')->with('cateList', $cateList)->with('user_id', $admin['id']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$post = $request->all();
        $post = $request->all();
        $post['content_html'] = $post['editor-md-html-code'];
        $post['published_at'] = time();
        //dd($post);
        $postModel = new Posts;
        if ($postModel->fill($post)->save()) {
            return redirect('admin/article');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $cateList = Category::all()->toArray();
        $cateList = listToTree($cateList);
        return view('admin.article.edit')->with(compact('post','id', 'cateList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');
        $post['content_html'] = $post['editor-md-html-code'];
        $re = Posts::find($id)->fill($post)->save();
        return redirect('admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImg($guid){
        $file = Input::file('file');
        $id = $guid; //Input::get('id');
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }

        $destinationPath = 'uploads/images/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        return Response::json(
            [
                'success' => true,
                'url' => asset($destinationPath.$fileName),
                'id' => $id
            ]
        );
    }
}
