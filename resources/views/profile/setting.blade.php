@extends('layouts.app')

{{-- Title --}}
@section('title')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Page name --}}
@section('page_name')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Content --}}
@section('content')
<div class="users-page">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="users-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="h1 card-title">Edit {{$user->name . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- image -->
                                <div class="form-group">
                                    <div class="image-preview text-center">
                                        <img class="preview rounded-circle border border-dark"
                                        src="{{asset('uploads/users/' . Auth::user()->profile->image)}}"
                                        alt="user image" width="60" height="60">
                                    </div>
                                    <label for="image">Image</label>
                                    <input class="form-control image" type="file" id="image" name="image">
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name"
                                    name="name" placeholder="Type Username" value="{{$user->name}}">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email"
                                    name="email" placeholder="Type Email Address" value="{{$user->email}}">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password"
                                    name="password" placeholder="Enter Your Password">
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input class="form-control" type="password" id="confirmPassword"
                                    name="password_confirmation" placeholder="Confirm password ">
                                </div>

                                <!-- Facebook -->
                                <div class="form-group">
                                    <label for="facebook">Facebook URL</label>
                                    <input class="form-control" type="text" id="facebook"
                                    name="facebook" placeholder="ex: http://www.facebook.com/username"
                                    value="{{$user->profile->facebook}}">
                                </div>

                                <!-- twitter -->
                                <div class="form-group">
                                    <label for="twitter">Twitter URL</label>
                                    <input class="form-control" type="text" id="twitter"
                                    name="twitter" placeholder="ex: http://www.twitter.com/username"
                                    value="{{$user->profile->twitter}}">
                                </div>

                                <!-- Github -->
                                <div class="form-group">
                                    <label for="github">Github URL</label>
                                    <input class="form-control" type="text" id="github"
                                    name="github" placeholder="ex: http://www.github.com/username"
                                    value="{{$user->profile->github}}">
                                </div>

                                <!-- about -->
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea class="form-control" name="about" id="about" cols="30"
                                    rows="10" placeholder="About Here">{{$user->profile->about}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        // Image Preview
        $('.image').change(function(){
            if(this.files && this.files[0]){

                let reader = new FileReader();

                reader.onload = function(e){

                    $('.preview').attr('src', e.target.result);

                }
                reader.readAsDataURL(this.files[0]);

            }
        })

    });
</script>
@endsection
