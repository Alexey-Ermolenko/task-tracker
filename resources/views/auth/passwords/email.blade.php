@extends('layouts.auth')

@section('title')
    {{__('Reset')}}
@endsection

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Password reset</div>
                        <div class="card-body">
                            <form action="" method="">
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <h6 class="h3">Password reset</h6>
                                        <p class="text-muted">Enter your email below to proceed.</p>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Reset password
                                        </button>
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
