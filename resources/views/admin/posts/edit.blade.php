@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Edit {{$post->title . "'s"}}
@endsection

{{-- Page name --}}
@section('page_name')
    Edit {{$post->title . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('tags.index')}}">Tags</a></li>
        <li class="breadcrumb-item">Edit {{$post->title . "'s"}}<li>
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
                        <h3 class="card-title">Edit {{$post->title . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('post.update', ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input class="form-control" type="text" id="title" name="title" placeholder="{{__("Type title of post")}}" value="{{$post->title}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">{{__('Content')}}</label>
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="{{__("Type Content of post")}}" required>{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">{{__('Category')}}</label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option>{{__('All of category')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $post->category_id ? "selected" : ""}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check">
                                    @foreach ($tags as $tag)
                                        <input class="form-check-input" type="checkbox" name="tags[]"
                                        value="{{$tag->id}}" id="tag"
                                        @foreach ($post->tags as $tag_id)
                                            @if ($tag->id == $tag_id->id)
                                                checked
                                            @endif
                                        @endforeach
                                        >

                                        <label class="form-check-label" for="tag">
                                            {{$tag->tag}}
                                        </label><br/>
                                    @endforeach
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
                                <button class="btn btn-primary" type="submit">{{__('Add')}}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection


