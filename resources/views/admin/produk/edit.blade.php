@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Produk {{ $product->no_part }}</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" id="add-product" action="{{ route('admin.product.update', ['id' => $product->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table>
                            <tr>
                                <th>Parts No.</th>
                                <td colspan="3"><input type="text" class="form-control" id="no_part" aria-describedby="no_part" name="no_part" placeholder="{{ $product->no_part }}"></td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td colspan="3"><input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang" name="nama_barang" placeholder="{{ $product->nama_barang }}"></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td colspan="3"><input type="text" class="form-control" id="keterangan" aria-describedby="keterangan" name="keterangan" placeholder="{{ $product->keterangan }}"></td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td colspan="1"><input type="number" class="form-control" id="stok" aria-describedby="stok" name="stok" placeholder="{{ $product->stok }}"></td>
                                <td colspan="2"><input type="text" class="form-control" id="satuan" aria-describedby="satuan" name="satuan" placeholder="{{ $product->satuan }}"></td>
                            </tr>
                            <tr>
                                <th>Harga Modal</th>
                                <td colspan="3"><input type="number" class="form-control" id="harga_modal" aria-describedby="harga_modal" name="harga_modal" placeholder="{{ number_format($product->harga_modal) }}"></td>
                            </tr>
                            <tr>
                                <th>Harga Jual 1</th>
                                <td><input type="number" class="form-control" id="harga_jual" aria-describedby="harga_jual" name="harga_jual" placeholder="{{ number_format($product->harga_jual) }}"></td>
                                <th>Discount 1</th>
                                <td><input type="number" class="form-control" id="diskon_1" aria-describedby="diskon_1" name="diskon_1" placeholder="{{ $product->diskon_1 }}"></td>
                            </tr>
                            <tr>
                                <th>Harga Jual 2</th>
                                <td><input type="number" class="form-control" id="harga_jual_1" aria-describedby="harga_jual_1" name="harga_jual_1" placeholder="{{ number_format($product->hargharga_jual_1a_jual) }}"></td>
                                <th>Discount 2</th>
                                <td><input type="number" class="form-control" id="diskon_2" aria-describedby="diskon_2" name="diskon_2" placeholder="{{ $product->diskon_2 }}"></td>
                            </tr>
                            <tr>
                                <th>Harga Jual 3</th>
                                <td><input type="number" class="form-control" id="harga_jual_2" aria-describedby="harga_jual_2" name="harga_jual_2" placeholder="{{ number_format($product->harga_jual_2) }}"></td>
                                <th>Discount 3</th>
                                <td><input type="number" class="form-control" id="diskon_3" aria-describedby="diskon_3" name="diskon_3" placeholder="{{ $product->diskon_3 }}"></td>
                            </tr>
                            <tr>
                                <th>Minimum</th>
                                <td><input type="number" class="form-control" id="minimum" aria-describedby="minimum" name="minimum" placeholder="{{ $product->minimum }}"></td>
                                <th>Maximum</th>
                                <td><input type="number" class="form-control" id="maximum" aria-describedby="maximum" name="maximum" placeholder="{{ $product->maximum }}"></td>
                            </tr>
                            <tr>
                                <th>Supplier</th>
                                <td colspan="3">
                                    <select name="supplier_id" id="supplier_id" class="form-control">
                                        <option value="{{ $product->pelanggan->id ?? '' }}">{{ $product->pelanggan->nama_pelanggan ?? '' }}</option>  
                                        @foreach ($suppliers as $supplier)
                                            @if (!empty($supplier->nama_pelanggan))
                                                <option value="{{ $supplier->id }}" {{ Request::get('supplier_id')== $supplier->id ? "selected" : "" }}>{{ $supplier->nama_pelanggan }}</option>  
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td colspan="3">
                                    <select name="merk_id" id="merk_id" class="form-control">
                                        <option value="{{ $product->merk->id ?? '' }}">{{ $product->merk->nama_merk ?? '' }}</option>  
                                        @foreach ($brands as $brand)
                                            @if (!empty($brand->nama_merk))
                                                <option value="{{ $brand->id }}" {{ Request::get('merk_id')== $brand->id ? "selected" : "" }}>{{ $brand->nama_merk }}</option>  
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td colspan="3">
                                    <select name="merk_kategori_id" id="merk_kategori_id" class="form-control">
                                        <option value="{{ $product->merk_kategori->id ?? '' }}">{{ $product->merk_kategori->merk_kategori ?? '' }}</option>  
                                        @foreach ($categories as $category)
                                            @if (!empty($category->merk_kategori))
                                                <option value="{{ $category->id }}" {{ Request::get('merk_kategori_id')== $category->id ? "selected" : "" }}>{{ $category->merk_kategori }}</option>  
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Car Type</th>
                                <td colspan="3">
                                    <select name="merk_subkategori_id" id="merk_subkategori_id" class="form-control">
                                        <option value="{{ $product->merk_subkategori->id ?? '' }}">{{ $product->merk_subkategori->merk_subkategori ?? '' }}</option>  
                                        @foreach ($car_types as $car_type)
                                            @if (!empty($car_type->merk_subkategori))
                                                <option value="{{ $car_type->id }}" {{ Request::get('merk_subkategori_id')== $car_type->id ? "selected" : "" }}>{{ $car_type->merk_subkategori }}</option>  
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Rak</th>
                                <td colspan="3">
                                    <select name="rak_id" id="rak_id" class="form-control">
                                        <option value="{{ $product->rak->id ?? '' }}">{{ $product->rak->nama_rak ?? '' }}</option>  
                                        @foreach ($raks as $rak)
                                            @if (!empty($rak->nama_rak))
                                                <option value="{{ $rak->id }}" {{ Request::get('rak_id')== $rak->id ? "selected" : "" }}>{{ $rak->nama_rak }}</option>  
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <button style="margin-top: 10px" type="submit" class="btn btn-primary">Update</button>
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
        $('#add-product').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('admin.product.update', ['id' => $product->id]) }}",
                method: 'POST',
                data: new FormData(event.target),
                processData: false,
                contentType:false,
            }).done(function() {
                location.href = "{{ route('admin.product') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Failed to add product',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush