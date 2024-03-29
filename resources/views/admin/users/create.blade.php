@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Add new user
@endsection

{{-- Page name --}}
@section('page_name')
    Add new user
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
        <li class="breadcrumb-item">Add new user<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
<div class="users-page page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="users-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title form-title">Add new user</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter name of user">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter email of user">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter password of user">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input class="form-control" type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm password of user">
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button class="btn btn-primary crayons-btn form-btn" type="submit">{{__('Add')}}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
