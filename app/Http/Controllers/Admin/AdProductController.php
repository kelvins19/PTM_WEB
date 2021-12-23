<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Rak;
use App\Models\Merk;
use App\Models\MerkKategori;
use App\Models\MerkSubKategori;

class AdProductController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';
        $brand = $request->brand ? $request->brand : '';
        $category = $request->category ? $request->category : '';
        $type = $request->type ? $request->type : '';

        $brands     = Merk::get();
        $categories = MerkKategori::get();
        $car_types  = MerkSubKategori::get();

        $products = Produk::orderBy('id', 'ASC')
                ->when($search != '', function ($q) use ($search) {
                    return $q->where('no_part', 'LIKE', '%'.$search.'%')
                                ->orWhere('nama_barang', 'LIKE', '%'.$search.'%');
                })
                ->when($brand != '', function ($q) use ($brand) {
                    return $q->where('merk_id', $brand);
                })
                ->when($category != '', function ($q) use ($category) {
                    return $q->where('merk_kategori_id', $category);
                })
                ->when($type != '', function ($q) use ($type) {
                    return $q->where('merk_subkategori_id', $type);
                })
                ->paginate(30);

        $products = $products->appends([
            'search'   => $request->input('search', ''),
            'brand'   => $request->input('brand', ''),
            'category'   => $request->input('category', ''),
            'type'   => $request->input('type', ''),
        ]);

        return view('admin.produk.index')
                ->with('products', $products)
                ->with('brands', $brands)
                ->with('categories', $categories)
                ->with('car_types', $car_types)
                ->with('search', $search);
    }

    public function viewProductDetail(Request $request)
    {
        $product = Produk::where('id', $request->id)->first();
        return view('admin.produk.detail')->with('product', $product);
    }

    public function edit(Request $request)
    {
        $product    = Produk::where('id', $request->id)->first();
        $suppliers  = Pelanggan::get();
        $brands     = Merk::get();
        $categories = MerkKategori::get();
        $car_types  = MerkSubKategori::get();
        $raks       = Rak::get();

        return view('admin.produk.edit')
                ->with('product', $product)
                ->with('brands', $brands)
                ->with('categories', $categories)
                ->with('car_types', $car_types)
                ->with('suppliers', $suppliers)
                ->with('raks', $raks);

    }

    public function update(Request $request, $id)
    {
        $product_data   = Produk::where('id', $id)->first();

        $variables = [
            'no_part'            => $request->no_part ?? $product_data->no_part,
            'nama_barang'        => $request->nama_barang ?? $product_data->nama_barang,
            'keterangan'         => $request->keterangan ?? $product_data->keterangan,
            'stok'               => $request->stok ?? $product_data->stok,
            'satuan'             => $request->satuan ?? $product_data->satuan,
            'harga_modal'        => $request->harga_modal ?? $product_data->harga_modal,
            'harga_jual'         => $request->harga_jual ?? $product_data->harga_jual,
            'harga_jual_1'       => $request->harga_jual_1 ?? $product_data->harga_jual_1,
            'harga_jual_2'       => $request->harga_jual_2 ?? $product_data->harga_jual_2,
            'diskon_1'           => $request->diskon_1 ?? $product_data->diskon_1,
            'diskon_2'           => $request->diskon_2 ?? $product_data->diskon_2,
            'diskon_3'           => $request->diskon_3 ?? $product_data->diskon_3,
            'minimum'            => $request->minimum ?? $product_data->minimum,
            'maximum'            => $request->maximum ?? $product_data->maximum,
            'supplier_id'        => $request->supplier_id ?? $product_data->supplier_id,
            'merk_id'            => $request->merk_id ?? $product_data->merk_id,
            'merk_kategori_id'   => $request->merk_kategori_id ?? $product_data->merk_kategori_id,
            'merk_subkategori_id' => $request->merk_subkategori_id ?? $product_data->merk_subkategori_id,
            'rak_id'             => $request->rak_id ?? $product_data->rak_id,
        ];

        $product = Produk::where('id', $id)->update($variables);

        if ($product !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/product/view/'.$id)
                        ->withSuccess('You have Successfully updated produk '.$id);

    }

    public function add(Request $request)
    {
        $suppliers  = Pelanggan::get();
        $brands     = Merk::get();
        $categories = MerkKategori::get();
        $car_types  = MerkSubKategori::get();
        $raks       = Rak::get();

        return view('admin.produk.add')
                ->with('brands', $brands)
                ->with('categories', $categories)
                ->with('car_types', $car_types)
                ->with('suppliers', $suppliers)
                ->with('raks', $raks);
    }

    public function createNewProduct(Request $request)
    {
        $variables = [
            'no_part'            => $request->no_part ?? '',
            'nama_barang'        => $request->nama_barang ?? '',
            'keterangan'         => $request->keterangan ?? '',
            'stok'               => $request->stok ?? '',
            'satuan'             => $request->satuan ?? '',
            'harga_modal'        => $request->harga_modal ?? '',
            'harga_modal_1'      => 0,
            'bonus'              => 0,
            'harga_jual'         => $request->harga_jual ?? '',
            'harga_jual_1'       => $request->harga_jual_1 ?? '',
            'harga_jual_2'       => $request->harga_jual_2 ?? '',
            'diskon_1'           => $request->diskon_1 ?? '',
            'diskon_2'           => $request->diskon_2 ?? '',
            'diskon_3'           => $request->diskon_3 ?? '',
            'minimum'            => $request->minimum ?? '',
            'maximum'            => $request->maximum ?? '',
            'supplier_id'        => $request->supplier_id ?? '',
            'merk_id'            => $request->merk_id ?? '',
            'merk_kategori_id'   => $request->merk_kategori_id ?? '',
            'merk_subkategori_id' => $request->merk_subkategori_id ?? '',
            'rak_id'             => $request->rak_id ?? '',
        ];

        $product = Produk::create($variables);

        return redirect()->intended('admin/product')
                            ->withSuccess('You have Successfully created product');
    }

    public function delete(Request $request)
    {
        $product = Produk::where('id', $request->id)->delete();
        return redirect()->intended('admin/product')->withSuccess('You have Successfully deleted produk '.$request->id );
    }
}
