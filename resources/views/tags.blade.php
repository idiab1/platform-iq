@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__('Taga')}}
@endsection

@section('content')
<!--Tags page -->
<section class="tags-page">
    <div class="row">
        <div class="col-12">
            <div class="tags-head">
                <h2>Tag</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($tags->count() > 0)
            @foreach ($tags as $tag)
                <div class="col-md-4">
                    <div class="card card-tag">
                        <div class="card-body tag-content">
                            <h4>{{$tag->tag}}</h4>
                            @if ($tag->tag_info != null)
                                {{$tag->tag_info}}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        @endif
    </div>

</section>
<!-- End of tags page-->
@endsection
