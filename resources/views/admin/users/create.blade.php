@extends('layouts.admin.main')

@section('title')
    Create new user
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title text-center">
                    <h3 class="mt-3">
                        Create new user
                    </h3>
                </div>
                <hr>
                <div class="card-body p-3">
                    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Name
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" 
                                            placeholder="Name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{old('name')}}">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">
                                        Email
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" 
                                            placeholder="Email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{old('email')}}">
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">
                                        Password
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" 
                                            placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{old('password')}}">
                                        @error('password')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-sm-3 col-form-label">
                                        Password Confirmation
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password_confirmation" 
                                            placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{old('password')}}"
                                            required autocomplete="new-password">
                                        @error('password_confirmation')
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