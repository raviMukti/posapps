@extends('theme.layout.home')

@section('css_after')
    <!-- Custom styles for this page -->
    <link href="{!! asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                @if( $category->active == 1)
                                <td>TRUE</td>
                                @else
                                <td>FALSE</td>
                                @endif
                                <td>
                                    <a href="">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('js_after')
    <!-- Page level plugins -->
    <script src="{!! asset('theme/vendor/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') !!}"></script>

    <!-- Page level custom scripts -->
    <script src="{!! asset('theme/js/demo/datatables-demo.js') !!}"></script>
@endsection
