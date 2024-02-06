@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="row">
                    @foreach ($posts as $post)
                        @if($post->published)
                        <div class="col-md-4 mb-2">
                            <div class="card h-100">
                                <img src="{{asset($post->photo)}}"
                                    class="card-img-top"
                                    alt="{{$post->title_en}}">
                                <div class="card-body">
                                    <div class="card-title fw-bold">
                                        {{$post->title_en}}
                                    </div>
                                    <p class="card-text">
                                        {{ Str::limit($post->body_en, 100) }}
                                    </p>
                                    <a href="{{route('posts.show', $post)}}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif   
                    @endforeach
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-center">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layouts.sidebar') --}}
    </div>
@endsection