<?php
/**
 * @Author: shishao
 * @Date:   2016-11-30 23:56:43
 * @Last Modified by:   shishao
 * @Last Modified time: 2016-12-01 01:07:31
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';

    protected $fillable = ['name', 'description','create_time'];
}