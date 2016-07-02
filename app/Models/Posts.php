<?php
/**
 * @Author: shishaoqi
 * @Date:   2016-07-01 11:55:18
 * @Last Modified by:   shishao
 * @Last Modified time: 2016-07-02 12:20:53
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'blog_posts';

    protected $fillable = ['user_id', 'title', 'slug', 'excerpt', 'content_html', 'content_mark_down', 'published_at', 'published', 'cate_id'];
}
