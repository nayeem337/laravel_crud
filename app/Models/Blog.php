<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    protected static $blog;
    protected static $imageFile, $imageName, $imageDirectory, $imageUrl;

    protected $fillable = ['title','content','image'];

    public static function newBlog($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName = time().rand(10,1000).self::$imageFile->getClientOriginalName();
        self::$imageDirectory = 'assets/image/upload/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl = self::$imageDirectory.self::$imageName;

        self::$blog          = new Blog();
        self::$blog-> title  = $request->title;
        self::$blog->content = $request->content;
        self::$blog->image   = self::$imageUrl;
        self::$blog->save();

//        Blog::create([
//            'title'=>$request->title,
//            'content'=>$request->content,
//            'image'=>$request->image
//        ]);
//        Blog::create($request->except('_token'));
    }
    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);

        self::$imageFile = $request->file('image');
        if(isset(self::$imageFile))
        {
            if(file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }


            self::$imageName = time().rand(10,1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'assets/image/upload/';
            self::$imageFile->move(self::$imageDirectory,self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }else
        {
            self::$imageUrl = self::$blog->image;
        }


        self::$blog-> title  = $request->title;
        self::$blog->content = $request->content;
        self::$blog->image   = self::$imageUrl;
        self::$blog->save();
    }
}
