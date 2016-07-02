<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('blog_posts', function(Blueprint $table){
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->integer('user_id');//用户id
            $table->string('title', 255);
            $table->string('slug', 255);//标签
            $table->integer('cate_id');//类别id
            $table->text('excerpt');//简介
            $table->text('content_html');
            $table->text('content_mark_down');
            $table->integer('published_at');//发布时间
            $table->tinyInteger('published');//是否公布
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
