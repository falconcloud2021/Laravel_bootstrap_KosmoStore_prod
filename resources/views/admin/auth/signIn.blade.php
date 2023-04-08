@extends('admin.layouts.admin-auth')

@section('auth')

<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
        
    <!-- Sign In Start -->
    <div class="container-fluid">
      <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
          <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <a href="index.html" class="">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <h3>Sign In</h3>
            </div>
            <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
              @csrf
              <div class="form-floating mb-3">
                <input class="form-control" type="email" id="email" name="email" required autofocus placeholder="name@example.com">
                <label for="InputAddress">Email address</label>
              </div>
              <div class="form-floating mb-4">
                <input class="form-control" type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                <label for="InputPassword">Password</label>
              </div>
              <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <a href="">Forgot Password</a>
              </div>
              <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
              <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
            </form>                                                             
          </div> <!-- dg -->
        </div> <!-- col -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
    <!-- Sign In End -->

  </div>
    
@endsection