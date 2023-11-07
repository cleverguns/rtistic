@extends('components.app')
@section('content')


    <a href="{{ route('brands.create')  }}" class="btn btn-danger mb-2">
        Add Brand
    </a>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Brands </h4>
            <div class="table-responsive">
                <table class="table" id="manage-users">
                    <thead>
                    <tr>
                        <th scope="col">Brand Logo</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Young Size</th>
                        <th scope="col">Adult Size</th>
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
            $("#manage-users").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api.brands') }}",
                columns: [
                    {data: 'brand_logo', name: 'brand_logo'},
                    {data: 'brand_name', name: 'brand_name'},
                    {data: 'brand_description', name: 'brand_description'},
                    {data: 'young_sizes', name: 'young_sizes'},
                    {data: 'adult_sizes', name: 'adult_sizes'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $("#manage-users").on("click", ".delete-brand", function(e){
                    e.preventDefault();

                    var id = $(this).data('brand_id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "/brands/"+id,
                                type: 'DELETE',
                                data: {
                                    "id": id,
                                    "_token": "{{ csrf_token() }}",
                                },
                                success: function (response){
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    $('#manage-users').DataTable().ajax.reload();
                                }
                            });
                        }
                    });
                });
        </script>

    @endpush
@endonce
