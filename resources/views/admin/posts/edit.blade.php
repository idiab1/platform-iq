@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Edit {{$post->title . "'s"}}
@endsection

{{-- Styles --}}
@section('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <style>
        /* Custom Style for select2 plugin */
        .select2-container .select2-selection--single {
            height: auto;
        }
        .select2-container--default.select2-container--open .select2-selection--single,
        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            border-color: var(--dark-blue);
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected],
        .select2-container--default .select2-results__option--highlighted[aria-selected]:hover{
            background-color:var(--dark-blue);
            color: #fff;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered li{
            color: #000;
            margin-right: 8px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple,
        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: var(--dark-blue);
        }
        .select2-search input {
            height: auto;
            color: #545454;
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .select2-container .select2-selection--single {
                font-size: 20px;
            }
            .select2-container--default .select2-results__option {
                padding: 8px 16px;
                font-size: 20px;
            }
            .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
                margin-right: 10px;
                font-size: 20px;
            }
        }

    </style>
@endsection

{{-- Page name --}}
@section('page_name')
    Edit {{$post->title . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
        <li class="breadcrumb-item">Edit {{$post->title . "'s"}}<li>
    </ol>
@endsection

{{-- Content --}}
@section('content')
<div class="tags-page page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="tags-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title form-title">Edit {{$post->title . "'s"}}</h3>
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
                                {{-- <div class="form-group">
                                    <label for="category">{{__('Category')}}</label>
                                    <select class="form-control" name="category_id" id="category" required>
                                        <option>{{__('All of category')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $post->category_id ? "selected" : ""}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <label for="category">{{__('Category')}}</label>
                                    <select class="form-control select2 searchable" name="category_id" id="category" required>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $post->category_id ? "selected" : ""}} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag">{{__('Tags')}}</label>
                                    <select class="form-control select2 searchable" name="tags[]" id="tag" multiple required>

                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}"
                                                @foreach ($post->tags as $tag_id)
                                                    {{$tag->id == $tag_id->id ? "selected" : ""}}
                                                @endforeach
                                                >
                                                {{$tag->tag}}
                                            </option>

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
                                <button class="btn btn-primary crayons-btn form-btn" type="submit">{{__('Update')}}</button>
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
