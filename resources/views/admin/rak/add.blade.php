@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Rak</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-rak" action="{{ route('admin.rak.create') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="rak_code">Kode rak</label>
                            <input type="text" class="form-control" id="rak_code" aria-describedby="rak_code" name="rak_code" placeholder="e.g. ABC123">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" class="form-control" id="desc" aria-describedby="desc" name="desc" placeholder="e.g. Lantai 2">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(() => {
        $('#add-rak').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.rak.create') }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.rak') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add rak',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush