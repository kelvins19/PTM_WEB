@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
  
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Products</h5>
                                <a href="{{ route('admin.product') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Merk</h5>
                                <a href="{{ route('admin.merk') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pelanggan</h5>
                                <a href="{{ route('admin.pelanggan') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Merk Kategori</h5>
                                <a href="{{ route('admin.merk-kategori') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rak</h5>
                                <a href="{{ route('admin.rak') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Merk Sub Kategori</h5>
                                <a href="{{ route('admin.merk-subkategori') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <a href="{{ route('admin.users') }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection