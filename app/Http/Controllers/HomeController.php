<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $blogs;

    public function home()
    {
        $this->blogs = Blog::all();
        return view('home.home',[
            'blogs'=>$this->blogs
        ]);
    }
}
