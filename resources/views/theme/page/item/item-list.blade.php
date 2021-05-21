@extends('theme.layout.home')

@section('css_after')
    <!-- Custom styles for this page -->
    <link href="{!! asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">
@endsection

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Item</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>SKU</th>
                            <th>Barcode</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->item_name }}</td>
                                <td>{{ $item->sku }}</td>
                                <td>{{ $item->barcode }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
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
