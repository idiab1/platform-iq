@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Posts of trashed')}}
@endsection

@section('content')
<div class="row justify-content-center posts-section posts_trashed">
    <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Title')}}</th>
                    <th scope="col">{{__('Content')}}</th>
                    <th scope="col">{{__('Image')}}</th>
                    <th scope="col">{{__('Restore')}}</th>
                    <th scope="col">{{__('Delete')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 1
                @endphp
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$id++}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>
                                <img src="{{asset("uploads/posts/" . $post->image)}}" width="60px" alt="">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route('post.restore', ['id' => $post->id])}}">
                                    <i class="fas fa-redo"></i> {{__('Restore')}}
                                </a>
                            </td>
                            <td>
                                <form action="{{route('post.hdelete', ['id' => $post->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i> {{__('Delete')}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>


    </div>
</div>
@endsection
