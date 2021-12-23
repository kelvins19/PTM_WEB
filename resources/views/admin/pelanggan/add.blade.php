@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add Pelanggan</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-pelanggan" action="{{ route('admin.pelanggan.create') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="plate">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" placeholder="e.g. PUTRA MOTOR">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Alamat</label>
                            <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat" placeholder="e.g. Jalan Bandang">
                        </div>
                        <div class="form-group">
                            <label for="driver_name">Daerah</label>
                            <input type="text" class="form-control" id="daerah" aria-describedby="daerah" name="daerah" placeholder="e.g. Makassar">
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
        $('#add-pelanggan').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.pelanggan.create') }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.pelanggan') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add pelanggan',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush