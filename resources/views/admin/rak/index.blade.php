@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form>
                <div class="form-row" style="margin-top: 20px;">
                    <div class="form-group col-md-6">
                        <label for="q">Search</label>
                        <input type="text" name="search" class="form-control" id="search" placeholder="Search..." value="{{ $search ?? '' }}" aria-label="search">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.rak') }}" class="btn btn-outline-primary">Reset filter</a>
                </div>
                <div class="form-group col-md-6">
                    <a href="{{ route('admin.rak.add') }}" class="btn btn-outline-success">Add Rak</a>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Kode Rak</th>
                    <th scope="col">Deskripsi</th>
                    <th colspan="2" scope="col" style="padding-left:4%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($raks))
                    @forelse($raks as $rak)
                        <tr>
                            <td>{{ $rak->nama_rak ?? '' }}</td>
                            <td>{{ $rak->deskripsi ?? '-' }}</td>
                            <td><a href="{{ route('admin.rak.edit', $rak->id) }}">Edit</a></td>
                            <td><a href="{{ route('admin.rak.delete', $rak->id) }}">Delete</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Sorry, no products found</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
            <div class="col-md-8">
                @if (!empty($raks))
                    {{ $raks->links('vendor.pagination.bootstrap-4') }}    
                @endif
            </div>
        </div>
    </div>

    
</div>
@endsection