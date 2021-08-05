@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Edit')}} {{$tag->tag . "'s"}}
@endsection

@section('content')
<div class="row justify-content-center tags-section">
    <div class="col-md-8">
        <div class="card form-tag">
            <div class="card-header">{{__('Edit')}} {{$tag->tag . "'s"}}</div>
            <form action="{{route('tag.update', ['id' => $tag->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="tag">{{__('Tag')}}</label>
                        <input class="form-control" type="text" id="tag" name="tag" placeholder="{{__("Type tag of tag")}}" required value="{{$tag->tag}}">
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">{{__('Update')}}</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
