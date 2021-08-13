@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Add new tag
@endsection

{{-- Page name --}}
@section('page_name')
    Add new tag
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
        <li class="breadcrumb-item">Add new tag<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
<div class="tags-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="tags-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new tag</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('tag.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tag">{{__('Tag')}}</label>
                                    <input class="form-control" type="text" id="tag" name="tag" placeholder="{{__("Type tag of tag")}}" required>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection



