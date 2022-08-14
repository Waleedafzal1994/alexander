@extends('layouts.app')

@section('style')

@endsection

@section('content')

    <div class="container-fluid" style="display:Flex; justify-content:center; align-items:center;">

        <div class="box-element" style="background:white; border-radius:10px; margin-top:70px;">
            <div class="header-page rounded-top">
                <div>
                    <h4>Sign Up</h4>
                </div>
            </div>

            <div style="padding:0 15px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row" style="padding-bottom:40px">


                        <div class="col-md-12">

                            <br>
                            <div class="row">
                                @error('email')
                                    <div class="col-md-12">

                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                @enderror
                                @error('name')
                                    <div class="col-md-12">

                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="col-md-12">

                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                @enderror

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h6>Nickname</h6>

                                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                </div>
                                 <!-- Remove this from registration -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <h6>Full Name</h6>

                                        <input id="real_name" type="text" class="@error('real_name') is-invalid @enderror"
                                            name="real_name" value="{{ old('real_name') }}" required
                                            autocomplete="real_name" autofocus>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h6>Email</h6>

                                        <input id="email" type="email" class="@error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h6>Password</h6>
                                        <input id="password" type="password"
                                            class=" @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h6>Confirm</h6>
                                        <input id="password-confirm-rg" type="password" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="button-primary" style="width:100%;" type="submit">Create Account</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
