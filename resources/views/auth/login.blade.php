@section('title', 'Login')

  @extends('layouts.guest')
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

              <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-4">
                  <input type="email" id="email" name="email" placeholder="name@example.com" required autofocus
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

                <div class="form-check mb-4">
                  <input type="checkbox" class="form-check-input" name="" id="">
                  <label for="" class="form-check-label">Remember Me</label>
                </div>

                {{-- Button --}}
                <button type="submit" class="btn btn-warning w-100">LOG IN</button>
                
                <div class="d-flex justify-content-end mt-4">
                </div>
                <p class="mb-0 text-center">Not Register Yet? <a href="/register" class="text-decoration-none">Register</a></p>
              </form>
            </div>
          </div>
        </div>
    </div>
  @endsection