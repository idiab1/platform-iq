@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Create New Post')}}
@endsection

@section('content')
<div class="row justify-content-center ">
    <div class="col-md-8">
        <div class="card form-post">
            <div class="card-header">{{ __('Create Post') }}</div>
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
    </div>
</div>
@endsection
