@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Home')}}
@endsection

@section('content')

<div class="homepage">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar-left">
                <h4>{{\App\Setting::first(['web_name'])->web_name}} Community</h4>
                <div class="sidebar-links">
                    <ul class="list-unstyled ">
                        <li>
                            <a href="{{route('home')}}">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.tags.home')}}">
                                <i class="fas fa-tags"></i>
                                Tags
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="article-list">
                <div class="article-list-head">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h1 headin">Posts</h2>
                        </div>
                    </div>
                </div>
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="card post mt-4 mb-4">
                            @if ($post->image)
                                <div class="card-header post-header">
                                    <img  class="img-fluid image-post" src="{{asset('uploads/posts/'. $post->image)}}" alt="{{$post->title}}">
                                </div>
                            @endif
                            <div class="card-body post-body">
                                <div class="row">
                                    <div class="col-md-2 image-user d-inline-block">
                                        <img class="img-fluid rounded-circle border border-dark"
                                        src="{{asset('uploads/users/' . $post->user->profile->image)}}"
                                        alt="user image"width="30" height="30">
                                    </div>
                                    <div class="col-md-8 post-content">
                                        <div class="post-content-head">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a class="" href="{{route('profile.index')}}">
                                                        {{$post->user->name}}
                                                    </a>
                                                </li>
                                                <li>
                                                    {{$post->created_at->diffForHumans()}}
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="h1">
                                            <a href="{{route('user.post.show', ['id' => $post->slug])}}">{{$post->title}}</a>
                                        </h3>
                                        <ul class="list-unstyled tags-list">
                                            @foreach ($post->tags as $tag)
                                                <li class="d-inline-block">
                                                    <a href="#">#{{$tag->tag}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group dropright">
                                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Dropdown menu links -->
                                                <a class="dropdown-item" href="{{route('user.post.edit', ['id' => $post->slug])}}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form class="dropdown-item" action="{{route('user.post.archive', ['id' => $post->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn" type="submit">
                                                        <i class="fas fa-archive"></i> {{__('Archive')}}
                                                    </button>
                                                </form>
                                                <form class="dropdown-item" action="{{route('user.posts.hdelete', ['id' => $post->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm" type="submit">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <p>There are no posts</p>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="sidebar-right">
                <h4>Categories</h4>
                <div class="sidebar-links">
                    <ul class="list-unstyled ">
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('user.category.show', ['id' => $category->id])}}">{{$category->name}}</a>
                                    <span class="badges badge-secondary">{{$category->posts->count()}}</span>
                                </li>
                            @endforeach
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
