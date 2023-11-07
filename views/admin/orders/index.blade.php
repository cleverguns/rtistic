@extends('components.app')
@section('content')


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Manage Orders </h4>
        <div class="table-responsive">
            <table class="table" id="manage-users">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Tracking Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order Total</th>
                        <th scope="col">Downpayment Status</th>
                        <th scope="col">Fullpayment Status</th>
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
