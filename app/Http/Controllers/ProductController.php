<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Merk;
use App\Models\MerkKategori;
use App\Models\MerkSubKategori;

class ProductController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';
        $search = strtoupper($search);
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

        return view('index')
                ->with('products', $products)
                ->with('brands', $brands)
                ->with('categories', $categories)
                ->with('car_types', $car_types)
                ->with('search', $search);
    }
}
