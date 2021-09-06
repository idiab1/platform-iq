@extends('layouts.app')

{{-- Title --}}
@section('title')
    Contacts
@endsection


{{-- Page name --}}
@section('page_name')
    Contacts
@endsection


{{-- Content --}}
@section('content')
<div class="contacts-page">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="contacts-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Contacts') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form class="create-post-form" action="{{route('user.contact.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">{{__('Username')}}</label>
                                    <input class="form-control" type="text" id="username" name="username" placeholder="{{__("Type username")}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Email Address')}}</label>
                                    <input class="form-control" type="text" id="email" name="email" placeholder="{{__("Type your email")}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">{{__('Message')}}</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="{{__("Type your message")}}" required></textarea>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary crayons-btn" type="submit">{{__('Submit')}}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

