@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Add new post
@endsection

{{-- Styles --}}
@section('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container .select2-selection--single {
            height: auto;
        }

    </style>
@endsection

{{-- Page name --}}
@section('page_name')
    Add new post
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
        <li class="breadcrumb-item">Add new post<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
<div class="posts-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="posts-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Create Post') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input class="form-control" type="text" id="title" name="title" placeholder="{{__("Type title of post")}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">{{__('Content')}}</label>
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="{{__("Type Content of post")}}" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">{{__('Category')}}</label>
                                    <select class="form-control select2 searchable" name="category_id" id="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag">{{__('Tags')}}</label>
                                    <select class="form-control select2 searchable" name="tags[]" id="tag" multiple required>
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->tag}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="image">{{__('Image')}}</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input class="custom-file-input" type="file" name="image" id="imageFile" aria-describedby="imageFile">
                                            <label class="custom-file-label" for="imageFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" id="btn" type="submit">{{__('Add')}}</button>
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
    <!-- Select 2 -->
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2();

        });
    </script>

@endsection
