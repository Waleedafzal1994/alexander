@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex; justify-content:center; align-items:center;">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card" style="width:25rem; border-radius:10px 10px 0 0; margin-top:70px; border:0px;">
                <div class="header-page rounded-top">
                    <div>
                        <h4>Login</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    @error('email')

                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>

                    @enderror
                    @error('password')

                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>

                    @enderror
                    <p class="card-text">Email</p>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <br>
                    <br>
                    <p class="card-text">Password</p>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    <br>
                    <br>
                    <div style="display:flex; align-items:center;">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                            style="width:initial; margin-right:10px; ">
                        <p class="card-text">Remember me? </p>

                    </div>

                    <div style="padding-top:30px; text-align:center;">


                        <button class="btn button-primary" style="padding:5px 20px; widtH:100%;">Login</button>
                        <br>
                        <br>
                        <div style="margin:5px 0;">
                            <small>or login with</small>
                        </div>


                        <div class="row" style="justify-content: center">
                            <a href="/auth/discord"><img src="{{ asset('imgs/auth/discord.jpg') }}" alt=""
                                    style="height:28px;"></a>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>







    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
