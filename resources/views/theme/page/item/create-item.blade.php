@extends('theme.layout.home')

@section('css_after')
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
@endsection

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Item</h6>
        </div>
    </div>

    <div class="card-body bg-gray-200 border-left-info">
        <div class="row">
            <div class="col-lg-12">
                <form role="form" id="form-create" method="POST" action="/web/posapps/item/store">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Item Name</label>
                        <input class="form-control" name="itemName">
                    </div>

                    <div class="form-group">
                        <label for="description">Item Description</label>
                        <textarea class="form-control" rows="3" name="itemDescription"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input class="form-control no-whitespace" name="itemSku">
                    </div>

                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input class="form-control no-whitespace" name="itemBarcode">
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category">
                            <option default>-- Choose Category -- </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id}}" name="itemCategory">{{ $category->category_name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" id="item-price" name="itemPrice">
                    </div>
                    <div class="form-group">
                        <label for="picture">Item Picture</label>
                        <input type="file" name="itemPicture">
                    </div>
                    <div class="checkbox">
                        <label for="publish">
                            <input type="checkbox" name="itemPublish">Publish
                        </label>
                        <label for="active">
                            <input type="checkbox" checked name="itemActive">Active
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script>
        jQuery(document).ready(function () {
           // For Remove White Space
            jQuery('.no-whitespace').on('keyup',function(e) {
                jQuery( this ).val(jQuery( this ).val().replace(/\s/g, ''));
            });
            // Change Non Numeric To Null
            jQuery('#item-price').on('keyup', function (e) {
                jQuery(this).val(jQuery(this).val().replace(/[^0-9\.]/g, ''));
            });
           // JQuery Validation
           jQueryValidaton('#form-create').validate({
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
