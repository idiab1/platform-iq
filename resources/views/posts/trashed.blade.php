@extends('layouts.app')

{{-- Title --}}
@section('title')
    Dashboard
@endsection

{{-- Page name --}}
@section('page_name')
    Dashboard
@endsection

{{-- Content --}}
@section('content')
<div class="dashboard-page">
    <div class="row">
        <div class="col-12">
            <div class="dashboard-head">
                <h2 class="h1 heading">
                    <a href="{{route('user.dashboard')}}">Dashboard</a> >> <a href="{{route('user.posts.trashed')}}">Posts Trashed</a>
                </h2>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-3">
            <div class="card status">
                <div class="card-body status-content">
                    <h4 class="status-count">0</h4>
                    <span>Test</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card status">
                <div class="card-body status-content">
                    <h4 class="status-count">0</h4>
                    <span>Test</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card status">
                <div class="card-body status-content">
                    <h4 class="status-count">0</h4>
                    <span>Test</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card status">
                <div class="card-body status-content">
                    <h4 class="status-count">0</h4>
                    <span>Test</span>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-3">
            <div class="posts-link">
                <ul class="list-unstyled">
                    <li class="active">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{route('user.dashboard')}}">Posts</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <span class="badges badge-secondary">{{$posts->count()}}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{route('user.posts.trashed')}}">Posts Archive</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <span class="badges badge-secondary">{{$postsTrashed->count()}}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-12">
                    <h3 class="h1 sub-headig">Posts Archive</h3>
                </div>
            </div>
            <div class="posts-list">
                @if ($postsTrashed->count() > 0)
                    @foreach ($postsTrashed as $post)
                        <div class="card post">
                            <div class="card-body post-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="post-content">
                                            <h3>
                                                <a href="{{route('user.post.show', ['id' => $post->slug])}}">
                                                    {{$post->title}}
                                                </a>
                                            </h3>
                                            <span>Published: {{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="post-management">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a class="btn btn-secondary btn-sm" href="{{route('user.posts.restore', ['id' => $post->id])}}">
                                                        <i class="fas fa-redo"></i> Restore
                                                    </a>
                                                </li>

                                                <li>
                                                    <form action="{{route('user.posts.hdelete', ['id' => $post->id])}}" method="POST">
                                                        <button class="btn btn-danger btn-sm" type="submit">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>

                                                </li>
                                            </ul>
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
    </div>

</div>
@endsection
