@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{__('List of all tags')}}
@endsection

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

{{-- Page name --}}
@section('page_name')
    List of all tags
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Tags<li>
    </ol>
@endsection

@section('content')

<section class="tags-section page">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h3 class="card-title title">List of all tags</h3>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <a class="btn btn-create crayons-btn btn-primary float-sm-right" href="{{route('tag.create')}}">
                                <i class="fas fa-plus"></i>
                                Add New Tag
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Related to')}}</th>
                                <th scope="col">{{__('Edit')}}</th>
                                <th scope="col">{{__('Delete')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @if ($tags->count() > 0)
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$id++}}</td>
                                        <td>{{$tag->tag}}</td>
                                        <td>
                                            @if ($tag->posts->count() > 0)
                                                {{$tag->posts->count()}} posts published
                                            @else

                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm btn-edit" href="{{route('tag.edit', ['id' => $tag->id])}}">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{route('tag.destroy', ['id' => $tag->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm btn-delete" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Related to')}}</th>
                                <th scope="col">{{__('Edit')}}</th>
                                <th scope="col">{{__('Delete')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <!-- /.card-body -->
            </div>
        <!-- /.card -->
        </div>
        <!--/.col-12 -->
    </div>
    <!--/.row -->
</section>

@endsection

{{-- Scripts --}}
@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>

@endsection
