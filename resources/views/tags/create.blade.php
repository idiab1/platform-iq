@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Create New Tag')}}
@endsection

@section('content')
<div class="row justify-content-center tags-section">
    <div class="col-md-8">
        <div class="card form-tag">
            <div class="card-header">{{ __('Create Tag') }}</div>
            <form action="{{route('tag.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="tag">{{__('Tag')}}</label>
                        <input class="form-control" type="text" id="tag" name="tag" placeholder="{{__("Type tag of tag")}}" required>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('Add')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
