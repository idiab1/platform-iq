@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Home')}}
@endsection

@section('content')

<div class="homepage">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">Sidebar left</div>
        </div>
        <div class="col-md-6">
            <div class="article-list">Articles
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="card post mt-4 mb-4">
                            @if ($post->image)
                                <div class="card-header post-header">
                                    <img  class="img-fluid image-post" src="{{asset('uploads/posts/'. $post->image)}}" alt="{{$post->title}}">
                                </div>
                                @endif
                            <div class="card-body post-body">
                                <div class="post-content-head">
                                    <ul class="list-unstyled">
                                        <li>
                                            {{$post->created_at->diffForHumans()}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-content">
                                    <h3 class="h1">
                                        <a href="">{{$post->title}}</a>
                                    </h3>
                                    <ul class="list-unstyled tags-list">
                                        @foreach ($post->tags as $tag)
                                            <li class="d-inline-block">
                                                <a href="#">#{{$tag->tag}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    false
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="sidebar-right">Sidebar Right</div>
        </div>
    </div>
</div>

{{-- <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div> --}}
@endsection
