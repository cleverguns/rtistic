@extends('components.app')
@section('content')


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manage Reports </h4>
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
