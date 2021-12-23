@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Merk SubKategori</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-merk-subkategori" action="{{ route('admin.merk-subkategori.update', ['id' => $merk->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="merk_subkategori">Nama Merk SubKategori</label>
                            <input type="text" class="form-control" id="merk_subkategori" aria-describedby="merk_subkategori" name="merk_subkategori" placeholder="{{ $merk->merk_subkategori }}">
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
        $('#add-merk-subkategori').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.merk-subkategori.update', ['id' => $merk->id]) }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.merk-subkategori') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add merk-subkategori',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush