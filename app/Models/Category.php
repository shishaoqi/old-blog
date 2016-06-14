<?php
/**
 * @Author: shishao
 * @Date:   2016-06-11 17:24:24
 * @Last Modified by:   shishao
 * @Last Modified time: 2016-06-11 17:26:11
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name', 'title','pid','order', 'view', 'keywords', 'description'];
}
