@extends('master')

@section('title')
    Manage Blogs
@endsection
@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Blogs</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->content}}</td>
                                        <td>
                                            <img src="{{asset($blog->image)}}" alt="" style="height: 60px"/>
                                        </td>
                                        <td>
                                            <a href="{{route('blog.edit', ['id'=>$blog->id])}}"class="btn btn-secondary">edit</a>
                                            <a href="{{route('blog.delete',['id'=>$blog->id])}}" onclick="return confirm('Are you sure to Delete this?')" class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
