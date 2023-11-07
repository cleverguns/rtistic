@extends('components.app')
@section('content')

    <style>
        .color-preview {
            border: 1px solid #CCC;
            margin: 2px;
            zoom: 1;
            vertical-align: top;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            width: 20px;
            height: 20px;
        }
    </style>

    <div class="row">

{{--         display errors from validator --}}

        @if ($errors->any())
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="col-sm-12 col-md-6 col-lg-6">
            <form method="POST" action="{{ route('product.store') }}"  enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="brand_name">Product Thumbnail</label>
                        <input type="file" class="form-control" name="product_thumbnail" id="product_thumbnail"  data-height="400" value="{{ old('product_thumbnail') }}" accept="images/*">
                    </div>

                    <div class="form-group mt-2">
                        <label for="brand_name">Product Images (Multiple Images)</label>
                        <input type="file" class="form-control product_images" name="product_images" id="product_images" multiple data-height="100" data-min-width="260" data-default-file="{{ old('brand_logo') }}" value="{{ old('brand_logo') }}" accept="images/*">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="product_sku">Product SKU</label>
                        <input type="text" class="form-control" name="product_sku" id="product_sku" aria-describedby="helpId" placeholder="" readonly value="{{ $product_sku_generated }}">
                    </div>

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text"
                               class="form-control" name="product_name" id="product_name" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="product_description">Description</label>
                        <textarea class="form-control" name="product_description" id="product_description" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-2">
                            <label class="form-label">Select Color</label>
                        <select id="color-select" multiple="multiple" class="form-select" name="product_color[]">
                            @foreach($colors as $color)
                                <option value="{{ $color->color_code }}">{{ $color->color_name }}</option>
                            @endforeach
                            <!-- Add more color options as needed -->
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="product_category">Category</label>
                        <input name='product_category' class='tagify--outside form-control' placeholder='Select Sizes' value="{{ old('product_category') }}" />
                    </div>

                    <div class="form-group mt-2">
                            <label for="product_brand">Brand / Supplier </label>
                            <select class="form-control" name="product_brand" id="product_brand">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="product_price">Price</label>
                        <input type="number" class="form-control" name="product_price" id="product_price" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group mt-2">
                        <label for="product_stocks">Stocks</label>
                        <input type="number" class="form-control" name="product_stocks" id="product_stocks" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group mt-2">
                        <label for="product_tags">Tags</label>
                        <input name='product_tags[]' id="product_tags" class='tagify--outside form-control' />
                    </div>

                    <button type="submit" class="btn btn-danger mt-2"> Add Product </button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@once
    @push('scripts')
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

        <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

        <script>
        $("#product_brand").select2();

        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Turn input element into a pond with configuration options
        $('.product_images').filepond({
            allowMultiple: true,
        });


        $("#product_thumbnail").dropify({
                messages: {
                    'default': 'Image Here',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong happended.'
                },
            useOriginalName: true,
            });

            var product_category = document.querySelector('input[name=product_category]')
            // init Tagify script on the above inputs
            var tagify = new Tagify(product_category, {
                whitelist: ["XS", "S", "M", "L", "XL", "XXL", "XXXL"],
                dropdown: {
                    position: "input",
                    enabled : 0, // always opens dropdown when input gets focus
                    width  : 100 // set to 100% of input width
                }
            });

            // The DOM element you wish to replace with Tagify
            var product_tags = document.querySelector('#product_tags');

            // initialize Tagify on the above input node reference
            new Tagify(product_tags)


            $(document).ready(function() {
                // Initialize Select2 on the select element
                $("#color-select").select2({
                    templateResult: formatOption,
                    templateSelection: formatOption
                });

                // Initialize Spectrum color picker on the select2 dropdown
                $("#color-select").on("select2:open", function() {
                    $(".select2-dropdown .select2-results").spectrum({
                        showPalette: true,
                        change: function(color) {
                            // Handle the selected color here
                            console.log(color.toHexString());
                            // You can also update the original select element's value if needed
                            // Note that for a multi-select, you might need to store selected colors in an array.
                        }
                    });
                });

                // Custom template for displaying color previews
                function formatOption(option) {
                    if (!option.id) {
                        return option.text;
                    }

                    var $option = $(
                        '<span><span class="color-preview" style="background-color:' + option.id + '"></span> ' + option.text + '</span>'
                    );

                    return $option;
                }
            });

        FilePond.setOptions({
            server: {
                process: '/admin/products/upload-temp',
                revert: '/admin/products/delete-temp',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });

        </script>

    @endpush
@endonce
