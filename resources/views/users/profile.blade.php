@extends('layouts.main')

@section('title')
    {{__('Account settings')}}
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('main') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
        <div class="row">
            <div class="col-xl-3">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-image"></i>
                        User avatar
                    </div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-user"></i>
                        Main profile info
                    </div>
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="first name" value="">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Email</label>
                                <input type="text" class="form-control" placeholder="Email" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Phone</label>
                                <input type="text" class="form-control" value="" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Gender</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <hr/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Google</label>
                                <input type="text" class="form-control" placeholder="google" value="">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="button">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-line me-1"></i>
                        Statistic info
                    </div>
                    <div class="card-body">
                        <p>...</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Change Password
                    </div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary" type="button">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
            </div>
            <div class="col-xl-9">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Delete Account
                    </div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                        <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
