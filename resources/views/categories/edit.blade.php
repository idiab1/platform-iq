@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Edit')}} {{$category->name . "'s"}}
@endsection

@section('content')
<div class="row justify-content-center categories-section">
    <div class="col-md-8">
        <div class="card form-category">
            <div class="card-header">{{__('Edit')}} {{$category->name . "'s"}}</div>
            <form action="{{route('category.update', ['id' => $category->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input class="form-control" type="text" id="name" name="name"
                        placeholder="{{__("Type name of category")}}"
                        value="{{$category->name}}" required>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('Edit')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
