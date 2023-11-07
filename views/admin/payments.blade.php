@extends('components.app')
@section('content')


<button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add User
</button>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manage Payments </h4>
        <div class="table-responsive">
            <table class="table" id="manage-users">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Role</th>
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
    $("#manage-users").DataTable();
</script>

@endpush
@endonce
