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
                    <div class="form-group col-md-2">
                        <label for="state">Daerah</label>
                        <select name="daerah" id="daerah" class="form-control">
                            <option value="">All</option>
                            @if (!empty($daerah))  
                                @foreach ($daerah as $nama_daerah)
                                    @if ($nama_daerah !== '')
                                        <option value="{{ $nama_daerah }}" {{ Request::get('daerah')== $nama_daerah ? "selected" : "" }}>{{ $nama_daerah }}</option>  
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('admin.pelanggan') }}" class="btn btn-outline-primary">Reset filter</a>
                </div>
                <div class="form-group col-md-6">
                    <a href="{{ route('admin.pelanggan.add') }}" class="btn btn-outline-success">Add Customer</a>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Daerah</th>
                    <th colspan="2" scope="col" style="padding-left:4%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @if (!empty($customers))
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->nama_pelanggan ?? '' }}</td>
                            <td>{{ $customer->alamat ?? '' }}</td>
                            <td>{{ $customer->daerah ?? '' }}</td>
                            <td><a href="{{ route('admin.pelanggan.edit', $customer->id) }}">Edit</a></td>
                            <td><a href="{{ route('admin.pelanggan.delete', $customer->id) }}">Delete</a></td>
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
                @if (!empty($customers))
                    {{ $customers->links('vendor.pagination.bootstrap-4') }}    
                @endif
            </div>
        </div>
    </div>

    
</div>
@endsection