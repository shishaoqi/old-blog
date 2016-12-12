<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Models\Posts;
use Event;
use App\Events\Postsaved;
use App\Listeners\SaveDataToCache;
//use App\Http\Requests\ArticleCreateRequest;

class ArticleController extends Controller
{
    protected $fields = [
        'user_id' => '',
        'title' => '',
        'slug' => '',
        'cate_id' => '',
        'excerpt' => '',
        //'content_html' => '',
        'content_mark_down' => '',
        //'published_at' => '',
        'published' => '',

       /* 'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,*/
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(10);
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
    public function store(Requests\ArticleCreateRequest $request)
    {
        /*$validator = $this->validator($request->all());
        if ($validator->fails()) {  //手动的添加错误        
            return redirect('/create')
                ->withErrors($validator)
                ->withInput();
        }*/
        $post = $request->all();
        $post['content_html'] = $post['editor-md-html-code'];
        $post['published_at'] = time();
        $post['published'] = 0;
        $postModel = new Posts;
        /*foreach (array_keys($this->fields) as $field) {
            $postModel->$field = $request->get($field);
        }
        $postModel->content_html = $post['editor-md-html-code'];
        $postModel->published_at = time();
        $postModel->published = 0;

        $postModel->save();
        return redirect('admin/article')->withSuccess("The tag '$postModel->title' was added seuccess.");*/
        if ($postModel->fill($post)->save()) {
            Event::fire(new PostSaved($postModel));
            return redirect('admin/article')->withSuccess("The tag '$postModel->title' was added seuccess.");
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
        $postModel = Posts::find($id);
        if(!$postModel)  exit('指定文章不存在！');

        $post = $request->except('_token');
        $post['content_html'] = $post['editor-md-html-code'];
        $re = $postModel->fill($post)->save();
        Event::fire(new PostSaved($postModel));

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
        /*$post = Posts::findOrFail($id);
        $post->delete();*/

        $re = Posts::destroy($id);;
        if($re){
            $data = [
                'status' => 1,
                'msg' => '删除成功！',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '删除失败，请稍后重试！',
            ];
        }
        return $data;
        //return redirect('/admin/article')->withSuccess("The '$post->title' post has been deleted.");
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
