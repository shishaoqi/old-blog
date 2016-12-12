<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function form()
    {
        return view('test.form');
    }

    public function testValidate(Requests\FormRequest $request)
    {
        return 'success';
    }
}
