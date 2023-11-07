@extends('components.app')
@section('content')
    <div class="row">
        <h4>Settings</h4>
        <div class="col-md-12">
           <div class="card">
             <div class="card-body">

                 <div class="form-group">
                     <label for="">Site Title</label>
                     <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                 </div>

                 <div class="form-group mt-2">
                     <label for="">Site Description</label>
                     <textarea class="form-control" name="" id="" rows="3"></textarea>
                 </div>

                 <div class="form-group mt-2">
                     <label for="">Site Logo</label>
                     <input type="file" class="form-control" name="" id="" placeholder=""
                            aria-describedby="fileHelpId">
                 </div>

                 <div class="form-group mt-2">
                     <label for="">Site Icon</label>
                     <input type="file" class="form-control" name="" id="" placeholder=""
                            aria-describedby="fileHelpId">
                 </div>

                 <div class="form-group mt-2">
                     <label for="">Site Tags</label>
                     <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                 </div>
             </div>
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
