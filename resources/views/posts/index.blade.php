@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('All Of Posts')}}
@endsection

@section('content')
<div class="row justify-content-center posts-section">
    <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Title')}}</th>
                    <th scope="col">{{__('Content')}}</th>
                    <th scope="col">{{__('Image')}}</th>
                    <th scope="col">{{__('Edit')}}</th>
                    <th scope="col">{{__('Archive')}}</th>
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
                                <a class="btn btn-success" href="{{route('post.edit', ['id' => $post->id])}}">
                                    <i class="fas fa-edit"></i> {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form action="{{route('post.archive', ['id' => $post->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-info" type="submit">
                                        <i class="fas fa-archive"></i> {{__('Archive')}}
                                    </button>
                                </form>

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
