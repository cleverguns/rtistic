@extends('components.app')
@section('content')

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

    <div class="page-header">
        <h1 class="display-5 text-danger">Customized T-Shirt Template Product</h1>
        <hr>
    </div>
    <div class="row mt-5">
        <div class="col-2">
            <nav>
                <div class="nav nav-pills" id="nav-tab" role="tablist">
                    <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#options" type="button"
                            role="tab">T-Shirt Options
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#customize" type="button" role="tab">
                        Customization
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="options" role="tabpanel" tabindex="0">
                    <div class="mt-3">
                        <p class="lead">Choose a T-Shirt Type:</p>
                        <select id="tshirttype" class="form-select">
                            <option value="designer_assets/img/crew_front.png" selected="selected">Short Sleeve</option>
                            <option value="designer_assets/img/mens_longsleeve_front.png">Long Sleeve</option>
                            <option value="designer_assets/img/mens_hoodie_front.png">Hoodies</option>
                            <option value="designer_assets/img/mens_tank_front.png">Tank tops</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <p class="lead">Choose a T-Shirt Color:</p>
                        <ul class="nav">
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="White"
                                style="background-color:#ffffff;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Dark Heather" style="background-color:#616161;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Gray"
                                style="background-color:#f0f0f0;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Charcoal"
                                style="background-color:#5b5b5b;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Black"
                                style="background-color:#222222;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Heather Orange" style="background-color:#fc8d74;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Salmon"
                                style="background-color:#eead91;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Chesnut"
                                style="background-color:#806355;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Dark Chocolate" style="background-color:#382d21;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Citrus Yellow" style="background-color:#faef93;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Avocado"
                                style="background-color:#aeba5e;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Kiwi"
                                style="background-color:#8aa140;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Irish Green" style="background-color:#1f6522;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Scrub Green" style="background-color:#13afa2;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Teal Ice"
                                style="background-color:#b8d5d7;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Heather Sapphire" style="background-color:#15aeda;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top" title="Sky"
                                style="background-color:#a5def8;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Antique Sapphire" style="background-color:#0f77c0;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Heather Navy" style="background-color:#3469b7;"></li>
                            <li class="color-preview" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Cherry Red" style="background-color:#c50404;"></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="customize" role="tabpanel" tabindex="0">
                    <div class="mt-3">
                        <p class="lead">Insert Text:</p>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="Add Text Here"
                                   placeholder="Add Text Here...">
                            <span class="input-group-text">
                                    <button id="add-text" class="btn btn-danger" title="Add text"><i
                                            class="fa-solid fa-paper-plane"></i></button>
                                </span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="lead">Add Picture:</p>
                        <div class="row w-100 text-center">
                            <div class="col-6">
                                <img src="designer_assets/images/bia-andrade-PO8Woh4YBD8-unsplash.jpg"
                                     class="img-fluid mx-auto d-block wd-adjust rounded" data-bs-toggle="tooltip"
                                     data-bs-placement="bottom" alt="Patterns by Bia Andrade"
                                     title="Patterns by Bia Andrade" style="cursor:pointer;">
                            </div>
                            <div class="col-6">
                                <img src="designer_assets/images/henrik-donnestad-t2Sai-AqIpI-unsplash.jpg"
                                     class="img-fluid mx-auto d-block wd-adjust rounded" data-bs-toggle="tooltip"
                                     data-bs-placement="bottom" alt="Wave by Henrik Dønnestad"
                                     title="Wave by Henrik Dønnestad" style="cursor:pointer;">
                            </div>
                            <div class="col-6">
                                <img src="designer_assets/images/jezael-melgoza-7H77FWkK_x4-unsplash.jpg"
                                     class="img-fluid mx-auto d-block wd-adjust rounded" data-bs-toggle="tooltip"
                                     data-bs-placement="bottom" alt="Tokyo Tower by Jezael Melgoza"
                                     title="Tokyo Tower by Jezael Melgoza" style="cursor:pointer;">
                            </div>
                            <div class="col-6">
                                <img src="designer_assets/images/nasa-rTZW4f02zY8-unsplash.jpg"
                                     class="img-fluid mx-auto d-block wd-adjust rounded" data-bs-toggle="tooltip"
                                     data-bs-placement="bottom" alt="Galaxy by NASA" title="Galaxy by NASA"
                                     style="cursor:pointer;">
                            </div>
                            <div class="col-6">
                                <img src="designer_assets/images/nasa-Yj1M5riCKk4-unsplash.jpg"
                                     class="img-fluid mx-auto d-block wd-adjust rounded" data-bs-toggle="tooltip"
                                     data-bs-placement="bottom" alt="Astronaut by NASA" title="Astronaut by NASA"
                                     style="cursor:pointer;">
                            </div>
                            <div class="col-6">
                                <img src="designer_assets/images/orfeas-green-G5A5ZNjS2tE-unsplash.jpg"
                                     class="img-fluid mx-auto d-block wd-adjust rounded" data-bs-toggle="tooltip"
                                     data-bs-placement="bottom" alt="Pattens by Orfeas Green"
                                     title="Pattens by Orfeas Green" style="cursor:pointer;">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="formFile" class="form-label">Upload Custom Picture</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            T-Shirt Preview
            <div class="span6">
                <div align="center" style="min-height: 32px;">
                    <div class="clearfix">
                        <div class="btn-group inline pull-left" id="texteditor" style="display:none">
                            <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                    title="Font Style"><i class="icon-font"
                                                          style="width:19px;height:19px;"></i></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Helvetica');"
                                       class="Helvetica">Helvetica</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Courier');" class="Courier">Courier</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Impact');" class="Impact">Impact</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Monaco');" class="Monaco">Monaco</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Optima');" class="Optima">Optima</a>
                                </li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Hoefler Text');"
                                       class="Hoefler Text">Hoefler Text</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Plaster');"
                                       class="Plaster">Plaster</a></li>
                                <li><a tabindex="-1" href="javascript:void(0)" onclick="setFont('Engagement');"
                                       class="Engagement">Engagement</a></li>
                            </ul>
                            <button id="text-bold" class="btn" data-original-title="Bold"><img
                                    src="old/img/font_bold.png" height="" width=""></button>
                            <button id="text-italic" class="btn" data-original-title="Italic"><img
                                    src="old/img/font_italic.png" height="" width=""></button>
                            <button id="text-strike" class="btn" title="Strike" style=""><img
                                    src="old/img/font_strikethrough.png" height="" width=""></button>
                            <button id="text-underline" class="btn" title="Underline" style=""><img
                                    src="old/img/font_underline.png"></button>
                            <a class="btn" href="#" rel="tooltip" data-placement="top"
                               data-original-title="Font Color"><input type="hidden" id="text-fontcolor"
                                                                       class="color-picker" size="7" value="#000000"></a>
                            <a class="btn" href="#" rel="tooltip" data-placement="top"
                               data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor"
                                                                              class="color-picker" size="7" value="#000000"></a>
                            <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
                        </div>
                        <div class="pull-right" align="" id="imageeditor" style="display:none">
                            <div class="btn-group">
                                <button class="btn" id="bring-to-front" title="Bring to Front"><i
                                        class="icon-fast-backward rotate" style="height:19px;"></i></button>
                                <button class="btn" id="send-to-back" title="Send to Back"><i
                                        class="icon-fast-forward rotate" style="height:19px;"></i></button>
                                <button id="flip" type="button" class="btn" title="Show Back View"><i
                                        class="icon-retweet" style="height:19px;"></i></button>
                                <button id="remove-selected" class="btn" title="Delete selected item"><i
                                        class="icon-trash" style="height:19px;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--	EDITOR      -->
                <button id="flipback" type="button" class="btn" title="Rotate View"><i class="fa-solid fa-rotate"
                                                                                       style="height:19px;"></i></button>
                <div id="shirtDiv" class="page"
                     style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255);">
                    <img name="tshirtview" id="tshirtFacing" src="old/img/crew_front.png">
                    <div id="drawingArea"
                         style="position: absolute;top: 100px;left: 160px;z-index: 10;width: 200px;height: 400px;">
                        <canvas id="tcanvas" width=200 height="400" class="hover"
                                style="-webkit-user-select: none;"></canvas>
                    </div>
                </div>
            </div>



            <!-- <button id="flipback" type="button" class="btn" title="Rotate View"><i class="icon-retweet"
                    style="height:19px;"></i></button>
            <div id="shirtDiv" class="page"
                style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255);">
                <img src="old/img/crew_front.png" class="img-fluid mx-auto d-block" id="tshirtview" />
                <div id="drawingArea"
                    style="position: absolute;top: 100px;left: 160px; z-index: 10;width: 200px;height: 400px;">
                    <canvas id="tcanvas" width=200 height="400" class="hover"
                        style="-webkit-user-select: none;"></canvas>
                </div>
            </div> -->
        </div>
        <div class="col-4">

            <div class="form-group">
                <label for="product_sku">Product SKU</label>
                <input type="text" class="form-control" name="product_sku" id="product_sku" aria-describedby="helpId"
                       placeholder="" readonly value="{{ $product_sku_generated }}">
            </div>

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text"
                       class="form-control" name="product_name" id="product_name" aria-describedby="helpId"
                       placeholder="">
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
                <input name='product_category' class='tagify--outside form-control' placeholder='Select Sizes'
                       value="{{ old('product_category') }}"/>
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
                <input type="number" class="form-control" name="product_price" id="product_price"
                       aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group mt-2">
                <label for="product_stocks">Stocks</label>
                <input type="number" class="form-control" name="product_stocks" id="product_stocks"
                       aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group mt-2">
                <label for="product_tags">Tags</label>
                <input name='product_tags[]' id="product_tags" class='tagify--outside form-control'/>
            </div>

            <button type="submit" class="btn btn-danger mt-2"> Add Product</button>
        </div>
    </div>

@endsection
@once
    @push('scripts')
        <script type="text/javascript" src="designer_assets/js/fabric.js"></script>
        <script type="text/javascript" src="designer_assets/js/tshirtEditor.js"></script>
        <script type="text/javascript" src="designer_assets/js/jquery.miniColors.min.js"></script>

        <script>

            var valueSelect = $("#tshirttype").val();
            $("#tshirttype").change(function () {
                valueSelect = $(this).val();
                alert(valueSelect);
            });
            $('#flipback').click(
                function () {
                    if (valueSelect === "designer_assets/img/crew_front.png") {
                        if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/crew_back.png");
                            a = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(b);
                                canvas.loadFromJSON(b);
                            } catch (e) {
                            }

                        } else {
                            $(this).attr('data-original-title', 'Show Back View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/crew_front.png");
                            b = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(a);
                                canvas.loadFromJSON(a);
                            } catch (e) {
                            }
                        }
                    } else if (valueSelect === "designer_assets/img/mens_longsleeve_front.png") {
                        if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/mens_longsleeve_back.png");
                            a = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(b);
                                canvas.loadFromJSON(b);
                            } catch (e) {
                            }

                        } else {
                            $(this).attr('data-original-title', 'Show Back View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/mens_longsleeve_front.png");
                            b = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(a);
                                canvas.loadFromJSON(a);
                            } catch (e) {
                            }
                        }
                    } else if (valueSelect === "designer_assets/img/mens_tank_front.png") {
                        if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/mens_tank_back.png");
                            a = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(b);
                                canvas.loadFromJSON(b);
                            } catch (e) {
                            }

                        } else {
                            $(this).attr('data-original-title', 'Show Back View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/mens_tank_front.png");
                            b = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(a);
                                canvas.loadFromJSON(a);
                            } catch (e) {
                            }
                        }
                    } else if (valueSelect === "designer_assets/img/mens_hoodie_front.png") {
                        if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/mens_hoodie_back.png");
                            a = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(b);
                                canvas.loadFromJSON(b);
                            } catch (e) {
                            }

                        } else {
                            $(this).attr('data-original-title', 'Show Back View');
                            $("#tshirtFacing").attr("src", "designer_assets/img/mens_hoodie_front.png");
                            b = JSON.stringify(canvas);
                            canvas.clear();
                            try {
                                var json = JSON.parse(a);
                                canvas.loadFromJSON(a);
                            } catch (e) {
                            }
                        }
                    }
                    /*	if ($(this).attr("data-original-title") == "Show Back View") {
                            $(this).attr('data-original-title', 'Show Front View');
                         $("#tshirtFacing").attr("src","img/crew_back.png");
                         a = JSON.stringify(canvas);
                         canvas.clear();
                         try
                         {
                            var json = JSON.parse(b);
                            canvas.loadFromJSON(b);
                         }
                         catch(e)
                         {}

                     } else {
                         $(this).attr('data-original-title', 'Show Back View');
                         $("#tshirtFacing").attr("src","img/crew_front.png");
                         b = JSON.stringify(canvas);
                         canvas.clear();
                         try
                         {
                            var json = JSON.parse(a);
                            canvas.loadFromJSON(a);
                         }
                         catch(e)
                         {}
                     }		*/
                    canvas.renderAll();
                    setTimeout(function () {
                        canvas.calcOffset();
                    }, 200);
                });
        </script>

        <script>
            var product_category = document.querySelector('input[name=product_category]')
            // init Tagify script on the above inputs
            var tagify = new Tagify(product_category, {
                whitelist: ["XS", "S", "M", "L", "XL", "XXL", "XXXL"],
                dropdown: {
                    position: "input",
                    enabled: 0, // always opens dropdown when input gets focus
                    width: 100 // set to 100% of input width
                }
            });

            $(document).ready(function () {
                // Initialize Select2 on the select element
                $("#color-select").select2({
                    templateResult: formatOption,
                    templateSelection: formatOption
                });

                // Initialize Spectrum color picker on the select2 dropdown
                $("#color-select").on("select2:open", function () {
                    $(".select2-dropdown .select2-results").spectrum({
                        showPalette: true,
                        change: function (color) {
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
        </script>
    @endpush
@endonce
