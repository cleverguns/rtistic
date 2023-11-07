@extends('components.app')
@section('content')

<script src="{{ asset('designer_assets/js/excanvas.js') }}"></script>
<script src="{{ asset('designer_assets/js/fabric.js') }}"></script>

<style type="text/css">
    .footer {
        padding: 70px 0;
        margin-top: 70px;
        border-top: 1px solid #E5E5E5;
        background-color: whiteSmoke;
    }

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

    .rotate {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
        -ms-transform: rotate(90deg);
    }

    .Arial {
        font-family: "Arial";
    }

    .Helvetica {
        font-family: "Helvetica";
    }

    .MyriadPro {
        font-family: "Myriad Pro";
    }

    .Delicious {
        font-family: "Delicious";
    }

    .Verdana {
        font-family: "Verdana";
    }

    .Georgia {
        font-family: "Georgia";
    }

    .Courier {
        font-family: "Courier";
    }

    .ComicSansMS {
        font-family: "Comic Sans MS";
    }

    .Impact {
        font-family: "Impact";
    }

    .Monaco {
        font-family: "Monaco";
    }

    .Optima {
        font-family: "Optima";
    }

    .HoeflerText {
        font-family: "Hoefler Text";
    }

    .Plaster {
        font-family: "Plaster";
    }

    .Engagement {
        font-family: "Engagement";
    }
</style>

<div>
    <div class="container page-content" >
        <h1>Customize T-Shirt</h1>
        <ul class="nav nav-tabs nav-justified nav-tabs-custom mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#custom-options" role="tab">
                    <i class="dripicons-home me-1 align-middle"></i> <span class="d-none d-md-inline-block">Options</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#custom-gravatar" role="tab">
                    <i class="dripicons-user me-1 align-middle"></i> <span class="d-none d-md-inline-block">Gravatar</span>
                </a>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div> <!-- Only required for left/right tabs -->
                    <!-- Nav tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="custom-options">
                            <div class="card">
                                <div class="card-body">
                                    <label for="tshirttype">T-Shirt Type</label>
                                    <select id="tshirttype" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="{{ asset('designer_assets/img/crew_front.png') }}">Short Sleeve Shirts</option>
                                        <option value="designer_assets/img/mens_longsleeve_front.png">Long Sleeve Shirts </option>
                                        <option value="designer_assets/img/mens_hoodie_front.png">Hoodies</option>
                                        <option value="designer_assets/img/mens_tank_front.png">Tank tops</option>
                                    </select>
                                </div>
                            </div>

                            <!--						      </p>-->
                            <!-- <div class="card mt-4">
                                <div class="card-body">
                                    <ul class="nav">
                                        <li class="color-preview" title="White" style="background-color:#ffffff;"></li>
                                        <li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
                                        <li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
                                        <li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
                                        <li class="color-preview" title="Black" style="background-color:#222222;"></li>
                                        <li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
                                        <li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
                                        <li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
                                        <li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
                                        <li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
                                        <li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
                                        <li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
                                        <li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
                                        <li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
                                        <li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
                                        <li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
                                        <li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
                                        <li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
                                        <li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
                                        <li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>
                                        <li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                        <div class="tab-pane" id="custom-gravatar">
                            <div class="well">
                                <h6>Add Text</h6>
                                <div class="input-append">
                                    <input class="form-control" id="text-string" type="text" placeholder="add text here...">
                                    <button id="add-text" class="btn btn-primary mt-2" title="Add text">
                                        Add text
                                    </button>
                                    <hr>
                                </div>
                                <h6>Select Images</h6>
                                <div id="avatarlist">
                                    @foreach($image_custom as $value)
                                    <img style="cursor:pointer; height:50px; width:50px;" class="img-polaroid" src="/images/{{$value->image}}">

                                    @endforeach
                                </div>
                                <div>
                                    <hr>
                                    <form action="/admin/image-upload-tshirt" method="post" enctype="multipart/form-data" id="imageForm">
                                        @csrf
                                        <input type="file" name="image" id="image">
                                        <input class="btn btn-primary" type="submit" value="Upload Custom Image" name="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div align="center" style="min-height: 32px;">
                    <div class="clearfix">
                        <div class="btn-group inline pull-left" id="texteditor">
                            <div class="dropdown">
                                <button id="font-family" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="icon-font" style="width: 19px; height: 19px;"></i> Font Style
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="font-family-X">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Courier');" class="Courier">Courier</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Impact');" class="Impact">Impact</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Optima');" class="Optima">Optima</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="setFont('Engagement');" class="Engagement">Engagement</a></li>
                                </ul>
                            </div>

                            <button id="text-bold" class="btn">
                                <img src="{{ asset('designer_assets/img/font_bold.png') }}" height="" width="">
                            </button>

                            <button id="text-italic" class="btn">
                                <img src="{{ asset('designer_assets/img/font_italic.png') }}" height="" width="">
                            </button>

                            <button id="text-strike" class="btn">
                                <img src="{{ asset('designer_assets/img/font_strikethrough.png') }}" height="" width="">
                            </button>

                            <button id="text-underline" class="btn">
                                <img src="{{ asset('designer_assets/img/font_underline.png') }}">
                            </button>

                            <div class="btn">
                                <input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000">
                            </div>

                            <div class="btn">
                                <input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000">
                            </div>

                            <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
                        </div>
                        <div class="pull-right" id="imageeditor">
                            <div class="btn-group">
                                <button id="bring-to-front" class="btn" title="Bring to Front"><i class="ri-bring-forward rotate" style="height:19px;"></i></button>
                                <button id="send-to-back" class="btn" title="Send to Back"><i class="ri-send-backward rotate" style="height:19px;"></i></button>
                                <button id="flip" type="button" class="btn" title="Show Back View"><i class="icon-retweet" style="height:19px;"></i></button>
                                <button id="remove-selected" class="btn" title="Delete selected item"><i class="icon-trash" style="height:19px;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--	EDITOR      -->
                <button id="flipback" type="button" class="btn" title="Rotate View" data-original-title="Show Back View">
                    <i class="icon-retweet" style="height:19px;"></i>Back
                </button>
                <div id="shirtDiv" class="page" style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255);">
                    <img name="tshirtview" id="tshirtFacing" src="">
                    <div id="drawingArea" style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">
                        <canvas id="tcanvas" width=200 height="400" class="hover" style="-webkit-user-select: none;"></canvas>
                    </div>
                </div>
            </div>
        </div>






        <div class="col-12">
            <h4>Add Product Details</h4>
            <div class="form-group">
                <label for="product_sku">Product SKU</label>
                <input type="text" class="form-control" name="product_sku" id="product_sku" aria-describedby="helpId" placeholder="" readonly value="{{ $product_sku_generated }}">
            </div>

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" aria-describedby="helpId" placeholder="">
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

            <button type="button" class="btn btn-danger mt-2" id="add_product"> Add Product</button>
        </div>
    </div>



    <div class="container p-5 rounded " style="background:white; box-shadow: 0 0 15px #0000004f;margin-bottom:100px">
        <div class="row">
            <div class="col-md-5" >
                <div class="row gx-3 ">
                    <div class="col-8 d-flex align-items-center">
                        <!-- main image -->
                        <img class="card-img-top" src="products_assets/BlueTshirt.png" alt="Card image cap">
                    </div>
                    <div class="col-4">
                        <div class="row gy-3">
                            <div class="col-12">
                                <img class="card-img-top" src="products_assets/BlackTshirt.jpg" alt="Card image cap">
                            </div>
                            <div class="col-12">
                                <img class="card-img-top" src="products_assets/BlueTshirt.png" alt="Card image cap">
                            </div>
                            <div class="col-12">
                            <img class="card-img-top" src="products_assets/BlackTshirt.jpg" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 d-flex align-items-center" style="border-left: 1px solid #c7c7c7">
                <div>
                    <h1 style="border-bottom: 4px solid #ff3d60" class="text-danger">Yalex Shirt</h1>
                    <p>Personalized Yalex Standard Round Neck Shirt with your Logo. This is made up of CVC fabric (60% Cotton, 40% Polyester) ideal for daily wear and company giveaways. Best with rubberized silkscreen print,vinyl print,photographic heat transfer or embroidery. Brand options are Winner, Softex, and Whistler.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-danger ">Youth Sizes:</h5>
                            <p>#6 | #10 | #16 | #20</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-danger ">Adult Sizes:</h5>
                            <p>#6 | #10 | #16 | #20</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--additional -->
            <form action="{{ url('/admin/products/add-from-custom-template') }}" method="post">
    @csrf <!-- Include CSRF token for form submission -->
    <!-- Add input fields for product details (name, description, etc.) -->
    <input type="text" name="product_name" placeholder="Product Name">
    <textarea name="product_description" placeholder="Product Description"></textarea>
    <!-- Other input fields for additional product details -->

    <button type="submit">Add Product</button>
</form>

            <!-- -->

        </div>
        
    </div>
</div>
<!-- Headings & Paragraph Copy -->
@endsection
@once
@push('scripts')

<script>
    $('#color-select').on('change', function() {
        var color = $(this).val();
        document.getElementById("shirtDiv").style.backgroundColor = color;
    })
    var valueSelect = $("#tshirttype").val();
    var front;
    var back;
    $("#tshirttype").change(function() {
        valueSelect = $(this).val();
        $("img[name=tshirtview]").attr("src", $(this).val());
    });
    $('#flipback').click(
        function() {
            var clothes = "{{ asset('designer_assets/img/crew_front.png') }}";
            if (valueSelect == clothes) {
                if ($(this).attr("data-original-title") == "Show Back View") {
                    $(this).attr('data-original-title', 'Show Front View');
                    $("#tshirtFacing").attr("src", "{{ asset('designer_assets/img/crew_back.png') }}");
                    front = JSON.stringify(canvas);
                    canvas.clear();
                    try {
                        var json = JSON.parse(back);
                        canvas.loadFromJSON(back);
                    } catch (e) {}
                } else {
                    $(this).attr('data-original-title', 'Show Back View');
                    $("#tshirtFacing").attr("src", "{{ asset('designer_assets/img/crew_front.png') }}");
                    back = JSON.stringify(canvas);
                    canvas.clear();
                    try {
                        var json = JSON.parse(front);
                        canvas.loadFromJSON(front);
                    } catch (e) {}
                }
            }
            canvas.renderAll();
            setTimeout(function() {
                canvas.calcOffset();
            }, 200);
        });

    $('#add_product').on('click', function() {
        console.log("Front JSON ->" + front + " back JSON" + back);
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                console.log(res);
            }
        })
    })

    $('#imageForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                console.log(res);
            }
        })
    })
</script>
<script src="{{ asset('designer_assets/js/tshirtEditor.js') }}"></script>
<script src="{{ asset('designer_assets/js/jquery.miniColors.min.js') }}"></script>

@endpush
@endonce