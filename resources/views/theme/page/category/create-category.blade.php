@extends('theme.layout.home')

@section('css_after')
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
@endsection

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
        </div>
    </div>

    <div class="card-body bg-gray-200 border-left-info">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" id="form-create" method="POST" action="/web/posapps/category/store">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input class="form-control no-whitespace" name="category_name">
                    </div>

                    <div class="checkbox">
                        <label for="active">
                            <input type="checkbox" value="true" checked name="active">Active
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" value="submit">Save</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    {{-- JQUERY VALIDATION --}}
    <script>
        jQuery(document).ready(function () {
            // For Remove White Space
            jQuery('.no-whitespace').on('keyup',function(e) {
                jQuery( this ).val(jQuery( this ).val().replace(/\s/g, ''));
            });
            // JQuery Validation
            jQueryValidaton("#form-create").validate({
                errorClass: "errorValidation",
                errorElement: "div",
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    }
                }
            });
        });
    </script>
@endsection
