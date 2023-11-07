@extends('components.app')
@section('content')


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Fullfilment </h4>
            <div class="table-responsive">
                <table class="table" id="manage-users">
                    <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Production Date</th>
                        <th scope="col">Production Status</th>
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
