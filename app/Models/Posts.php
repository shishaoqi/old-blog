<?php
/**
 * @Author: shishaoqi
 * @Date:   2016-07-01 11:55:18
 * @Last Modified by:   shishao
 * @Last Modified time: 2017-04-01 01:13:43
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'blog_posts';

    protected $fillable = ['user_id', 'title', 'excerpt', 'content_html', 'content_mark_down', 'published_at', 'published', 'cate_id'];

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tags','post_tag','post_id','tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category','id','cate_id');
    }

    /**
     * admins
     * @return [type] [description]
     */
    public function adminUser(){
        return $this->hasOne('App\Models\Admin','id','user_id');
    }

    public static function test(){
        dd(1);
    }

    /**
     * select tags 
     *
     * @param array $tags List of tags to select
     */
    public static function selectTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->lists('tag')->all();

        return $found;
    }
}
