@extends('components.app')
@section('content')

    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#add-category">
        Add Category
    </button>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Categories </h4>
            <div class="table-responsive">
                <table class="table" id="manage-categories">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date Added</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.category.create')
    @include('admin.category.edit')
@endsection
@once
    @push('scripts')

        <script>


            $("#manage-categories").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api.categories') }}",
                columns: [
                    {data: 'category_name', name: 'category_name'},
                    {data: 'date_added', name: 'date_added'},
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: true,
                        searchable: true
                    },
                ]
            });


            const update_toast = {
                title: "Success",
                message: "Category has been added successfully",
                status: TOAST_STATUS.SUCCESS,
                timeout: 10000
            }

            // Add Category
            $("#save-category").click(function (e) {
                create();
            });

            // Edit Category
            $("#manage-categories").on("click", ".edit-category", function (e) {
                e.preventDefault();
                var get_category_id = $(this).data('category_id');
                edit(get_category_id);
            });

            // Update Category
            $("#update-category").click(function (e) {
                update();
            });

            // Delete Category
            $("#manage-categories").on("click", ".delete-category", function (e) {
                e.preventDefault();
                var get_category_id = $(this).data('category_id');

                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure you want to delete this category?',
                    showDenyButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    denyButtonText: 'Cancel',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        destroy(get_category_id);
                    }
                });

            });

            function create() {
                let create_toast = {
                    title: "Success",
                    message: "Category has been added successfully",
                    status: TOAST_STATUS.SUCCESS,
                    timeout: 10000
                }

                let error_toast = {
                    title: "Error",
                    message: "Something went wrong",
                    status: TOAST_STATUS.DANGER,
                    timeout: 10000
                }

                const category_name = $('#category_name').val();
                $.post("{{ route('category.store') }}", {
                    category_name: $('#category_name').val(),
                    _token: "{{ csrf_token() }}"
                }).done(function (data, response, status) {

                    if (status.status === 200) {
                        $('#add-category').modal('hide');
                        $("#category_name").val("");
                        Toast.setTheme(TOAST_THEME.DARK);
                        Toast.create(create_toast);
                        $('#manage-categories').DataTable().ajax.reload();

                    }
                }).fail(function (data) {
                    Toast.create(error_toast);
                    console.log(data);
                });
            }

            function edit(category_id) {
                $.get("{{ route('category.edit') }}", {
                    category_id: category_id,
                    csrf_token: "{{ csrf_token() }}"
                }).done(function (data, response, status) {
                    if (status.status === 200) {
                        $('#edit-category').modal('show');
                        $('#edit_category_name').val(data.category.category_name);
                    }
                }).fail(function (data) {

                    Toast.create(error_toast);
                    console.log(data);
                });
            }

            function update(category_id) {

                let update_toast = {
                    title: "Success",
                    message: "Category has been updated!",
                    status: TOAST_STATUS.SUCCESS,
                    timeout: 3000
                }

                let error_toast = {
                    title: "Error",
                    message: "Something went wrong",
                    status: TOAST_STATUS.DANGER,
                    timeout: 3000
                }

                const category_name = $('#edit_category_name').val();
                $.ajax({
                    url: "{{ route('category.update') }}",
                    type: "PUT",
                    data: {
                        category_id: category_id,
                        category_name: category_name,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Toast.setTheme(TOAST_THEME.DARK);
                        Toast.create(update_toast);
                        $('#edit-category').modal('hide');
                        $("#edit_category_name").val("");
                        $('#manage-categories').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        Toast.create(error_toast);
                        console.log(data);
                    }
                });
            }

            function destroy(category_id) {

                let response_toast = {
                    title: "Success",
                    message: "Category has been deleted successfully",
                    status: TOAST_STATUS.SUCCESS,
                    timeout: 3000
                }

                let error_toast = {
                    title: "Error",
                    message: "Something went wrong",
                    status: TOAST_STATUS.DANGER,
                    timeout: 3000
                }


                $.ajax({
                    url: "{{ route('category.destroy') }}",
                    type: "DELETE",
                    data: {
                        category_id: category_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        Toast.setTheme(TOAST_THEME.DARK);
                        Toast.create(response_toast);
                        $('#manage-categories').DataTable().ajax.reload();
                    },
                    error: function (data) {

                        Toast.create(error_toast);
                        console.log(data);
                    }
                });
            }


        </script>

    @endpush
@endonce
