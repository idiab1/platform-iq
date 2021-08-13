@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Edit {{$tag->tag . "'s"}}
@endsection

{{-- Page name --}}
@section('page_name')
    Edit {{$tag->tag . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
        <li class="breadcrumb-item">Edit {{$tag->name . "'s"}}<li>
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
                        <h3 class="card-title">Edit {{$tag->tag . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('tag.update', ['id' => $tag->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tag">{{__('Tag')}}</label>
                                    <input class="form-control" type="text" id="tag" name="tag" placeholder="{{__("Type tag of tag")}}" required value="{{$tag->tag}}">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection







