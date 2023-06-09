@extends('layouts.auth')

@section('title')
    {{__('Login')}}
@endsection

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Your Password?</a>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <small>Not registered?</small>
                                        <a href="{{ route('register') }}" class="small font-weight-bold">Create account</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
