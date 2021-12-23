@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Merk Kategori</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-merk-kategori" action="{{ route('admin.merk-kategori.update', ['id' => $merk->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="merk_kategori">Nama merk</label>
                            <input type="text" class="form-control" id="merk_kategori" aria-describedby="merk_kategori" name="merk_kategori" placeholder="{{ $merk->merk_kategori }}">
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
        $('#add-merk-kategori').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.merk-kategori.update', ['id' => $merk->id]) }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.merk-kategori') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add merk-kategori',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush