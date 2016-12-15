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
        Schema::create('blog_posts', function(Blueprint $table){
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');//用户id
            $table->string('title', 255);
            //$table->string('slug', 255)->comment('标签');//标签
            $table->integer('cate_id')->comment('类别id');//类别id
            $table->text('excerpt')->comment('简介');//简介
            $table->text('content_html');
            $table->text('content_mark_down');
            $table->integer('published_at')->comment('发布时间');//发布时间
            $table->tinyInteger('published')->comment('是否公布');//是否公布
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
        Schema::drop('blog_posts');
    }

}
