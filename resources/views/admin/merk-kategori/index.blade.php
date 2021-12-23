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
                    <a href="{{ route('admin.merk-kategori') }}" class="btn btn-outline-primary">Reset filter</a>
                </div>
                <div class="form-group col-md-6">
                    <a href="{{ route('admin.merk-kategori.add') }}" class="btn btn-outline-success">Add Merk Kategori</a>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nama Merk Kategori</th>
                    <th colspan="2" scope="col" style="padding-left:4%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($merks))
                    @forelse($merks as $merk)
                        <tr>
                            <td>{{ $merk->merk_kategori ?? '' }}</td>
                            <td><a href="{{ route('admin.merk-kategori.edit', $merk->id) }}">Edit</a></td>
                            <td><a href="{{ route('admin.merk-kategori.delete', $merk->id) }}">Delete</a></td>
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
                @if (!empty($merks))
                    {{ $merks->links('vendor.pagination.bootstrap-4') }}    
                @endif
            </div>
        </div>
    </div>

    
</div>
@endsection