@extends('components.app')
@section('content')

    <a href="javascript:history.back()" class="btn btn-danger mb-2">
        Back
    </a>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
   @endif


    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name" aria-describedby="helpId" placeholder="" value="{{ old('brand_name') }}">
                            @if($errors->has('brand_name'))
                                <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="brand_description">Brand Description</label>
                            <textarea class="form-control" name="brand_description" id="brand_description" rows="3"> {{ old('brand_description') }}</textarea>
                            @if($errors->has('brand_description'))
                                <span class="text-danger">{{ $errors->first('brand_description') }}</span>
                            @endif
                        </div>

                        <div class="form-group mt-2">
                            <label for="young_sizes">Young Sizes</label>
                            <input class="form-control" id="young_sizes" name="young_sizes" placeholder="Type here" value="{{ old('young_sizes') }}" />
                            @if($errors->has('young_sizes'))
                                <span class="text-danger">{{ $errors->first('young_sizes') }}</span>
                            @endif
                        </div>

                        <div class="form-group mt-2">
                            <label for="brand_sizes">Adult Sizes</label>
                            <input name='adult_brand_sizes' class='tagify--outside form-control' placeholder='Select Sizes' value="{{ old('adult_brand_sizes') }}" />
                        @if($errors->has('adult_brand_sizes'))
                                <span class="text-danger">{{ $errors->first('adult_brand_sizes') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-2">
                            <label for="brand_name">Brand Logo</label>
                            <input type="file" class="form-control dropify" name="brand_logo" id="brand_logo" data-height="100" data-min-width="260" data-default-file="{{ old('brand_logo') }}" value="{{ old('brand_logo') }}">
                            @if($errors->has('brand_logo'))
                                <span class="text-danger">{{ $errors->first('brand_logo') }}</span>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <label class="custom-file">
                                <div class="mt-3">
                                    <label class="form-label">Image #1</label>
                                    <input type="file" class="filestyle" name="image_one" id="image_one" data-buttonname="btn-secondary" value="{{ old('image_one') }}">
                                    @if($errors->has('image_one'))
                                        <span class="text-danger">{{ $errors->first('image_one') }}</span>
                                    @endif
                                </div>
                            </label>

                            <label class="custom-file">
                                <div class="mt-3">
                                    <label class="form-label">Image #2</label>
                                    <input type="file" class="filestyle" name="image_two" id="image_two" data-buttonname="btn-secondary" value="{{ old('image_two') }}">
                                    @if($errors->has('image_two'))
                                        <span class="text-danger">{{ $errors->first('image_two') }}</span>
                                    @endif
                                </div>
                            </label>

                            <label class="custom-file">
                                <div class="mt-3">
                                    <label class="form-label">Image #3</label>
                                    <input type="file" class="filestyle" name="image_three" id="image_three" data-buttonname="btn-secondary" value="{{ old('image_three') }}">
                                    @if($errors->has('image_three'))
                                        <span class="text-danger">{{ $errors->first('image_three') }}</span>
                                    @endif
                                </div>
                            </label>

                            <label class="custom-file">
                                <div class="mt-3">
                                    <label class="form-label">Image #4</label>
                                    <input type="file" class="filestyle" name="image_four" id="image_four" data-buttonname="btn-secondary" value="{{ old('image_four') }}">
                                    @if($errors->has('image_four'))
                                        <span class="text-danger">{{ $errors->first('image_four') }}</span>
                                    @endif
                                </div>
                            </label>
                        </div>
                        </div>
                </div>
                <button type="submit" class="btn btn-danger mt-2">Submit</button>
            </form>
        </div>
    </div>

@endsection
@once
    @push('scripts')

        <script>
            $("#brand_logo").dropify({
                messages: {
                    'default': 'Drag and drop the logo here',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong happended.'
                },
            });

            var adult_brand_sizes = document.querySelector('input[name=adult_brand_sizes]')
            // init Tagify script on the above inputs
            var tagify = new Tagify(adult_brand_sizes, {
                whitelist: ["XS", "S", "M", "L", "XL", "XXL", "XXXL"],
                dropdown: {
                    position: "input",
                    enabled : 0 // always opens dropdown when input gets focus
                }
            })

            var young_sizes = document.querySelector('#young_sizes');
            new Tagify(young_sizes);
        </script>

    @endpush
@endonce
