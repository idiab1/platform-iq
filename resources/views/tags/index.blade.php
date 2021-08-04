@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('List all of tags')}}
@endsection

@section('content')
<div class="row justify-content-center tags-section">
    <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Edit')}}</th>
                    <th scope="col">{{__('Delete')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 1
                @endphp
                @if ($tags->count() > 0)
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{$id++}}</th>
                            <td>{{$tag->tag}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('tag.edit', ['id' => $tag->id])}}">
                                    <i class="fas fa-edit"></i> {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form action="{{route('tag.destroy', ['id' => $tag->id])}}" method="POST">
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
