@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form>
                <div class="form-row" style="margin-top: 20px;">
                    <div class="form-group col-md-6">
                        <label for="q">Search</label>
                        <input type="text" name="search" class="form-control" id="search" placeholder="Search..." value="{{ $search }}" aria-label="search">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="state">Brand</label>
                        <select name="brand" id="brand" class="form-control">
                            <option value="">All</option>  
                            @foreach ($brands as $brand)
                                @if (!empty($brand->nama_merk))
                                    <option value="{{ $brand->id }}" {{ Request::get('brand')== $brand->id ? "selected" : "" }}>{{ $brand->nama_merk }}</option>  
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="state">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">All</option>  
                            @foreach ($categories as $category)
                                @if (!empty($category->merk_kategori))
                                    <option value="{{ $category->id }}" {{ Request::get('category')== $category->id ? "selected" : "" }}>{{ $category->merk_kategori }}</option>  
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="state">Car Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">All</option>  
                            @foreach ($car_types as $car_type)
                                @if (!empty($car_type->merk_subkategori))
                                    <option value="{{ $car_type->id }}" {{ Request::get('type')== $car_type->id ? "selected" : "" }}>{{ $car_type->merk_subkategori }}</option>  
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('products') }}" class="btn btn-outline-primary">Reset filter</a>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Parts No.</th>
                    <th scope="col">Description</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Car Type</th>
                    @if(!Auth::guest()) 
                        @if (Auth::user()->roles === 0 || Auth::user()->roles === 1)
                            <th scope="col">Price</th>
                            <th scope="col">Stock Availability</th>
                        @endif
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->no_part }}</td>
                        <td>{{ $product->nama_barang }}</td>
                        <td>{{ $product->merk->nama_merk ?? '' }}</td>
                        <td>{{ $product->merk_kategori->merk_kategori ?? '' }}</td>
                        <td>{{ $product->merk_subkategori->merk_subkategori ?? '' }}</td>
                        @if(!Auth::guest()) 
                            @if (Auth::user()->roles === 0 || Auth::user()->roles === 1)
                                <td>Rp. {{ number_format($product->harga_jual) }}</td>
                                @if ($product->stok > 0)
                                    <td>Yes</td>
                                @else
                                    <td>No</td>
                                @endif
                            @endif
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Sorry, no products found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="col-md-8">
                {{ $products->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>

    
</div>
@endsection