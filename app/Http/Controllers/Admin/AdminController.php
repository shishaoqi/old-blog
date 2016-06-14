<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    public function index(){
        $admin = Auth::guard('admin')->user();

        return view('admin.index.index');
    }
}
