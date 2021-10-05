@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{$contact->username}}
@endsection

{{-- Content --}}
@section('content')
<div class="message-page page">
    <div class="row">
        <div class="col-md-8 col-sm-12 m-auto">
            <div class="card card-message">
                <div class="card-body message">
                    <div class="message-header">
                        <h5 class="card-title">{{$contact->username}}</h5>
                        <span>{{$contact->email}}</span>
                    </div>
                    <p class="card-text">
                        {{$contact->message}}
                    </p>
                    <form action="{{route('message.destroy', ['id' => $contact->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn-delete" type="submit">
                            <i class="fas fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



