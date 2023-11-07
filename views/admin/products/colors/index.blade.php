@extends('components.app')
@section('content')


    <button class="btn btn-danger mb-2" data-bs-target="#add-color" data-bs-toggle="modal">
        Add new Color
    </button>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Products </h4>
            <div class="table-responsive">
                <table class="table" id="manage-colors">
                    <thead>
                    <tr>
                        <th scope="col">Color Name</th>
                        <th scope="col">Color Value</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@include('admin.products.colors.create')
@endsection
@once
    @push('scripts')

        <script>
            $("#manage-colors").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api.colors') }}",
                columns: [
                    {data: 'color_name', name: 'color_name'},
                    {data: 'color_code', name: 'color_code'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $("#save-color").click(function(e){
                var color_name = $("#color_name").val();
                var color_value = $("#colorpicker-showinput-intial").val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('product.colors.store') }}",
                    data: {
                        color_name: color_name,
                        color_code: color_value,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        console.log(response);
                        $("#add-color").modal('hide');
                        $("#color-name").val('');
                        $("#colorpicker-showinput-intial").val("");
                        $("#manage-colors").DataTable().ajax.reload();
                    }
                });
            });
        </script>

    @endpush
@endonce
