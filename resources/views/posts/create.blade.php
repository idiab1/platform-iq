@extends('layouts.app')

{{-- Title --}}
@section('title')
    Add new post
@endsection

{{-- Page name --}}
@section('page_name')
    Add new post
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
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option>{{__('All of category')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check">
                                    @foreach ($tags as $tag)
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="tag">
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

