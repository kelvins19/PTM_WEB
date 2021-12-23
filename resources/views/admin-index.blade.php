@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
  
                <div class="row">
                    <div class="col">
                        <a href="{{ route('admin.product') }}">Products</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('admin.merk') }}">Merk</a>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <a href="{{ route('admin.pelanggan') }}">Pelanggan</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('admin.merk-kategori') }}">Merk Kategori</a>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <a href="{{ route('admin.rak') }}">Rak</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('admin.merk-subkategori') }}">Merk Sub Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection