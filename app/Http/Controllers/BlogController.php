<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogs, $blog;
    public function addBlog()
    {
        return view('blog.add');
    }
    public function newBlog (Request $request)
    {
        Blog::newBlog($request);
        return redirect()->back()->with('success','Blog Created Successfully.');
    }
    public function manageBlog()
    {
        $this->blogs = Blog::all();
        return view('blog.manage',[
            'blogs'=>$this->blogs
        ]);
    }
    public function deleteBlog($id)
    {
        $this->blog = Blog::find($id);
        if(file_exists($this->blog->image))
        {
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully');
    }
    public function editBlog($id)
    {
//       return $this->blog = Blog::where('id',$id)->first();
        $this->blog = Blog::find($id);
        return view('blog.edit',[
            'blog'=>$this->blog
        ]);
    }
    public function updateBlog(Request $request, $id)
    {
        Blog::updateBlog($request, $id);
        return redirect()->route('blog.manage')->with('success','Blog Updated Successfully.');
    }
}
