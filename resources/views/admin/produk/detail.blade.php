@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detail Produk {{ $product->no_part }}</h1>
                <a href="{{ route('admin.product.edit', $product->id) }}" target="_blank">Edit</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <th>Parts No.</th>
                            <td colspan="3">{{ $product->no_part }}</td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td colspan="3">{{ $product->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td colspan="3">{{ $product->keterangan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td colspan="3">{{ $product->stok }}  {{ $product->satuan }}</td>
                        </tr>
                        <tr>
                            <th>Harga Modal</th>
                            <td colspan="3">Rp. {{ number_format($product->harga_modal) }}</td>
                        </tr>
                        <tr>
                            <th>Harga Jual 1</th>
                            <td>Rp. {{ number_format($product->harga_jual) }}</td>
                            <th>Discount 1</th>
                            <td>{{ $product->diskon_1 }}%</td>
                        </tr>
                        <tr>
                            <th>Harga Jual 2</th>
                            <td>Rp. {{ number_format($product->harga_jual_1) }}</td>
                            <th>Discount 2</th>
                            <td>{{ $product->diskon_2 }}%</td>
                        </tr>
                        <tr>
                            <th>Harga Jual 3</th>
                            <td>Rp. {{ number_format($product->harga_jual_2) }}</td>
                            <th>Discount 3</th>
                            <td>{{ $product->diskon_3 }}%</td>
                        </tr>
                        <tr>
                            <th>Minimum</th>
                            <td>{{ $product->minimum }}</td>
                            <th>Maximum</th>
                            <td>{{ $product->maximum }}</td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td colspan="3">{{ $product->pelanggan->nama_pelanggan ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <td colspan="3">{{ $product->merk->nama_merk ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Product Category</th>
                            <td colspan="3">{{ $product->merk_kategori->merk_kategori ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Car Type</th>
                            <td colspan="3">{{ $product->merk_subkategori->merk_subkategori ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Rak</th>
                            <td colspan="3">{{ $product->rak->nama_rak ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection