@extends('components.app')
@section('content')


    <a href="{{ route('product.create')  }}" class="btn btn-danger mb-2">
        Add Products
    </a>
    <a href="{{ route('product.colors')  }}" class="btn btn-danger mb-2">
        Colors List
    </a>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Products </h4>
            <div class="table-responsive">
                <table class="table" id="manage-products">
                    <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product SKU</th>
                        <th scope="col">Product Thumbnail</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Brand</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
@once
    @push('scripts')

        <script>
            $("#manage-products").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api.products') }}",
                columns: [
                    {data: 'product_name', name: 'product_name'},
                    {data: 'product_sku', name: 'product_sku'},
                    {data: 'product_thumbnail', name: 'product_thumbnail'},
                    {data: 'product_price', name: 'product_price'},
                    {data: 'product_brand', name: 'product_brand'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        </script>

    @endpush
@endonce
