@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Create New Category')}}
@endsection

@section('content')
<div class="row justify-content-center categories-section">
    <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('First')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 1
                @endphp
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$id++}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('category.edit', ['id' => $category->id])}}">
                                    <i class="fas fa-edit"></i> {{__('Edit')}}
                                </a>
                                <form action="{{route('category.destroy', ['id' => $category->id])}}" method="POST">
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
