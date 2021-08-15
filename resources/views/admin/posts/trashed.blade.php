@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{__('Posts of trashed')}}
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
    {{__('Posts of trashed')}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Posts</a></li>
        <li class="breadcrumb-item">{{__('Posts of trashed')}}<li>
    </ol>
@endsection




@section('content')

<section class="posts-section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">List of all posts</h3>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-create btn-primary float-sm-right" href="{{route('post.create')}}">
                                <i class="fasfa-plus"></i>
                                Add New Post
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Restore')}}</th>
                                <th>{{__('Delete')}}</th>
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
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Restore')}}</th>
                                <th>{{__('Delete')}}</th>
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

