<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tags;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagList = Tags::all()->toArray();
        //dd($cateList);
        return view('admin.tag.index')->with('tagList', $tagList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TagCreateRequest $request)
    {
        //dd($_POST);
        $tag = new Tags;
        //dd($request->all());
        if ($tag->fill($request->all())->save()) {
            $data = array(
                    'status' => 1,
                    'msg' => '添加标签成功'
                );
        }else{
            $data = array(
                    'status' => 0,
                    'msg' => '添加标签失败'
                );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tags::find($id);
        return $tag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $re = Tags::find($id)->fill($request->except('_token', '_method'))->save();
        if($re){
            $data = array(
                    'status' => 1,
                    'msg' => '修改标签成功'
                );
        }else{
            $data = array(
                    'status' => -1,
                    'msg' => '修改标签成功'
                );
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re = Tags::destroy($id);;
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
    }

    public function getTagInfo(){

    }
}
