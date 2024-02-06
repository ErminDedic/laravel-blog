@extends('layouts.admin.main')

@section('title')
    Users
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <div>
                        <h4 class="card-title">
                            <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h4>
                   </div>
                   <hr>
                   <table class="table table-hovered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key+=1}}</td>
                                    <td>
                                        {{$user->name}}
                                    </td>

                                    <td>
                                        {{$user->email}}
                                    </td>

                                    <td>
                                        @if ($user->active)
                                            <a href="{{route('toggle.active', $user)}}">
                                                <span class="badge bg-success">
                                                    Active
                                                </span>
                                            </a>
                                        @else 
                                            <a href="{{route('toggle.active', $user)}}">
                                                <span class="badge bg-danger">
                                                    Inactive
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                    
                                    <td class="d-flex">
                                        <a href="{{route('users.edit',$user)}}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button onclick="
                                                        if(confirm('are you sure ?'))
                                                        document.getElementById({{$user->id}}).submit();
                                                        " class="btn btn-sm btn-danger mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="{{$user->id}}" action="{{route('users.destroy',$user)}}" method="post">
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