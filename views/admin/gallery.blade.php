@extends('components.app')
@section('content')


<button type="button" class="btn btn-danger mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#createGalleryModal">
    Add Picture
</button>



<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manage Gallery </h4>
        <div class="table-responsive">
            <table class="table" id="manage-images">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.gallery.create')
@endsection
@once
@push('scripts')

<script>
    $("#manage-images").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.gallery') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'image_name',
                name: 'image_name',
                render: function(data, type, full, meta) {
                    return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
                },
                orderable: false
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            },
        ]
    });

    $("#save_image").click(function(e) {
        e.preventDefault();
        var formData = new FormData();

        // Validate if image is .jpg, .jpeg, .png
        var fileInput = document.getElementById('image_name');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type. Only .jpg, .jpeg, .png files are allowed.');
            fileInput.value = '';
            return false;
        } else {
            formData.append('image_name', $('#image_name')[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                type: 'POST',
                url: "{{ route('gallery.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#createGalleryModal').modal('hide');
                    $('#manage-images').DataTable().ajax.reload();
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);

                }
            });
        }
    });

    $("#manage-images").on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('gallery.delete') }}",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#manage-images').DataTable().ajax.reload();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

    });
</script>

@endpush
@endonce
