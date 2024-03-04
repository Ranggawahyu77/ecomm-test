@extends('layouts.guest')
@section('title','Register')
@section('content')
<div class="container">
  <div class="row vh-100 align-items-center justify-content-center">
    <div class="col-sm-8 col-md-6 col-lg-4 m-auto">
  
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
  
      <div class="card border-0 shadow">
        <div class="card-body">
          <div class="row justify-content-center mb-4">
            <img src="/img/cart.png" class="w-25 mt-3">
          </div>
          <form action="/register" method="POST">
            @csrf
            <div class="form-floating mb-4">
              <input type="text" id="name" name="name" placeholder="name" required
              class="form-control">
              <label for="name">Name</label>
            </div>

            <div class="form-floating mb-4">
              <input type="email" id="email" name="email" placeholder="name@example.com" required
              class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
              <label for="email">Email address</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-floating mb-4">
              <input type="password" id="password" name="password" placeholder="Password" required
              class="form-control">
              <label for="password">Password</label>
            </div>

            {{-- Button --}}
            <div class="d-flex justify-content-end mt-4">
              <a href="/login" class="mx-3">Already Registered?</a>
              <button type="submit" class="btn btn-warning px-3">REGISTER</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
    
@endsection