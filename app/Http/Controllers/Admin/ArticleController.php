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

    public function uploadImg(Request $request){
        $file = $request->file('editormd-image-file');
        
        if($file->isValid()){
            $allowed_extensions = ["png", "jpg", "gif"];
            $extension = $file->getClientOriginalExtension();
            if ($extension && !in_array($extension, $allowed_extensions)) {
                return ['error' => 'You may only upload png, jpg or gif.'];
            }

            $destinationPath = base_path() . '/public/uploads/images/';
            if(!is_dir($destinationPath)){
                mkdir($destinationPath, 0777, true);
            }
            //dd($destinationPath);
            
            $fileName = date('YmdHis') . '_' . mt_rand(100, 999).'.'.$extension;
            $file->move($destinationPath, $fileName);
            $filePath = '/uploads/images/' . $fileName;
            echo json_encode(
                [
                    'success' => 1,
                    'url' =>  asset($filePath)
                ]
            );
        }
    }
}
