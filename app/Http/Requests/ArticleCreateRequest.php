<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'excerpt'=> 'required',
            //'content_html'=> 'required',
            'content_mark_down' => 'required',
            /* 'published_at'=> 'required',
            'published' => 'required',*/
            'cate_id' => 'required'
        ];
    }
}
