@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Merk</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-merk" action="{{ route('admin.merk.update', ['id' => $merk->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="nama_merk">Nama merk</label>
                            <input type="text" class="form-control" id="nama_merk" aria-describedby="nama_merk" name="nama_merk" placeholder="{{ $merk->nama_merk }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
        $('#add-merk').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.merk.update', ['id' => $merk->id]) }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.merk') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add merk',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush