@extends('auth.layouts.auth_app')

@section('content')

        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box">
                <div class="card-body">

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="p-4 rounded  border">
                            
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center">
                                <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                            </div>
                            <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                            <p class="text-muted">Enter your registered email ID to reset the password</p>
                            <div class="my-4">
                                <label class="form-label">Email id</label>
                                <input type="text" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-lg">Send</button> <a href="{{ route('login') }}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
