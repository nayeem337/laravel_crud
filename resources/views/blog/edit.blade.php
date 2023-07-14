@extends('master')
@section('title')
    Edit Blog
@endsection
@section('body')
    {{-- <h1>This is blog page</h1>--}}

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Blog</h3>
                        </div>
                        <div class="card-body">
                            <span>{{Session::get('success')}}</span>
                            <form action="{{route('blog.update',['id'=>$blog->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Blog Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" class="form-control" value="{{$blog->title}}"/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Content</label>
                                    <div class="col-md-8">
                                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$blog->content}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control"/>
                                        <img src="{{asset($blog->image)}}" alt="" style="height: 60px" class="mt-2">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success"  value="Update Blog"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
