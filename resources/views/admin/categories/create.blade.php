@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Add new category
@endsection

{{-- Page name --}}
@section('page_name')
    Add new category
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
        <li class="breadcrumb-item">Add new category<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
<div class="row justify-content-center categories-section page">
    <div class="col-md-8">
        <div class="card form-category">
            <div class="card-header">{{ __('Create Category') }}</div>
            <form action="{{route('category.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="{{__("Type name of category")}}" required>
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
