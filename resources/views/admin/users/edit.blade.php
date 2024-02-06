@extends('layouts.admin.main')

@section('title')
    Update
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title text-center">
                    <h3 class="mt-3">
                        Update user
                    </h3>
                </div>
                <hr>
                <div class="card-body p-3">
                    <form action="{{route('users.update',$user)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Name
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" 
                                            placeholder="Name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{$user->name, old('name')}}">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">
                                        Email
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" 
                                            placeholder="Email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{$user->email, old('email')}}">
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection