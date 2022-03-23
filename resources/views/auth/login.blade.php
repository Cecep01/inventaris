@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center" style="height: 80vh">
        <div class="col-md-4">
            <div class="card">
                <div class="card-title text-center fs-2">
                    login
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name = "email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name= "password" class="form-control" id="exampleInputPassword1">
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
