@extends('layouts.main')

@section('title')
    {{$post->title_en}}
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="card h-100">
                            <img src="{{asset($post->photo)}}"
                                class="card-img-top"
                                alt="{{$post->title_en}}">
                            <div class="card-body">
                                <div class="d-flex justify-content-center my-3">
                                    <span class="badge bg-danger">
                                        <i class="fas fa-clock me-1"></i>
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                                    <span class="badge bg-success mx-2">
                                        <i class="fas fa-user me-1"></i>
                                        {{$post->admin->name}}
                                    </span>
                                </div>
                                <div class="card-title fw-bold">
                                    {{$post->title_en}} 
                                </div>
                                <p class="card-text">
                                    {{$post->body_en}} 
                                </p>
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        @isset($previous)
                                            <a href="{{route('posts.show', $previous)}}" class="btn btn-link">
                                                <div>
                                                    Previous
                                                </div>
                                                {{$post->title_en}} 
                                            </a>
                                        @endisset
                                    </div>
                                    <div class="col-md-6">
                                        @isset($next)
                                            <a href="{{route('posts.show', $next)}}" class="btn btn-link">
                                                <div>
                                                    Next
                                                </div>
                                                {{$post->title_en}} 
                                            </a>
                                        @endisset
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        Tags: 
                                        @foreach ($post->tags as $tag)
                                            <a href="{{route('tag.posts',$tag)}}" class="btn btn-outline-secondary btn-sm mx-2">
                                                {{$tag->name}}    
                                            </a>   
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <comments-count></comments-count>
                                <hr>
                                <comments-component :post_id="{{$post->id}}"></comments-component>
                                <hr>
                                @auth
                                    <add-comment 
                                        :post_id="{{$post->id}}"
                                        :user_id="{{auth()->user()->id}}"></add-comment>
                                    
                                @endauth
                                @guest
                                    <div class="alert alert-info">
                                        <a href="{{route('login')}}" class="btn btn-link text-decoration-none text-dark">
                                            Log in to add your comment
                                        </a>      
                                    </div> 
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection