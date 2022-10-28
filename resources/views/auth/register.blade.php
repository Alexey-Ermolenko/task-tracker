@extends('layouts.auth')

@section('title')
    {{__('Register')}}
@endsection

@section('content')
    <main class="register-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Register
                        </div>
                        <div class="card-body">
                            <form name="my-form" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">{{__('Email address')}}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check-terms">
                                            <label class="custom-control-label" for="check-terms">{{__('I agree to the')}} <a href="#">{{__('terms and conditions')}}</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <small>Already have an acocunt?</small>
                                        <a href="{{ route('login') }}" class="small font-weight-bold">Sign in</a>
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
