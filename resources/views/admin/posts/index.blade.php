@extends('layouts.admin.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <div>
                        <h4 class="card-title">
                            <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h4>
                   </div>
                   <hr>
                   <table class="table table-hovered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title En</th>
                                <th>By</th>
                                <th>Published</th>
                                <th>Image</th>
                                <th>Added</th>
                                <th>Comments <comments-count></comments-count></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{$key+=1}}</td>
                                    <td>
                                        <a href="{{route('posts.show',$post)}}" target="_blank">
                                            {{$post->title_en}}
                                        </a>
                                    </td>
                                    <td>{{$post->admin->name}}</td>
                                    <td>
                                        @if ($post->published)
                                            <a href="{{route('toggle.published', $post)}}">
                                                <span class="badge bg-success">
                                                    published
                                                </span>
                                            </a>
                                        @else 
                                            <a href="{{route('toggle.published', $post)}}">
                                                <span class="badge bg-info">
                                                    draft
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{asset($post->photo)}}"
                                            width="60"
                                            height="60"
                                            class="rounded"
                                            alt="{{$post->title_en}}">
                                    </td>
                                    <td>
                                        {{$post->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <comments-component :post_id="{{$post->id}}"></comments-component>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('posts.edit',$post)}}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button onclick="
                                                        if(confirm('are you sure ?'))
                                                        document.getElementById({{$post->id}}).submit();
                                                        " class="btn btn-sm btn-danger mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="{{$post->id}}" action="{{route('posts.destroy',$post)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection