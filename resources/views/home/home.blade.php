@extends('master')

@section('title')
    Home Page
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">All Blog</h1>
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-md-4 mt-2">
                            <div class="card">
                                <img src="{{asset($blog->image)}}" alt="" class="card-img-top" style="height: 250px">
                                <div class="card-body">
                                    <h3>{{ \Illuminate\Support\Str::words($blog->title, 4, '') }}</h3>
                                    <p>{{ \Illuminate\Support\Str::words($blog->content, 15) }}</p>
                                    <a href="" class="btn btn-success">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
