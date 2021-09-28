@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Add new category
@endsection

{{-- Page name --}}
@section('page_name')
    Add new category
@endsection

{{-- Title --}}
@section('title')
    {{__('Edit')}} {{$category->name . "'s"}}
@endsection

@section('content')
<div class="row justify-content-center categories-section page">
    <div class="col-md-8">
        <div class="card form-category card-primary">
            <div class="card-header">
                <h3 class="card-title form-title">{{__('Edit')}} {{$category->name . "'s"}}</h3>
            </div>
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
                    <button class="btn btn-primary crayons-btn form-btn" type="submit">{{__('Update')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
