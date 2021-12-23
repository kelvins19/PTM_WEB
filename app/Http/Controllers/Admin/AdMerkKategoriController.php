<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\MerkKategori;
use App\Models\MerkSubKategori;

class AdMerkKategoriController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';

        $merks = MerkKategori::orderBy('id', 'ASC')
                    ->when($search != '', function ($q) use ($search) {
                        return $q->where('merk_kategori', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(20);

        $merks = $merks->appends([
            'search'   => $request->input('search', ''),
        ]);

        return view('admin.merk-kategori.index')
                ->with('merks', $merks)
                ->with('search', $search);
    }

    public function edit(Request $request)
    {
        $merk = MerkKategori::where('id', $request->id)->first();

        return view('admin.merk-kategori.edit')->with('merk', $merk);

    }

    public function update(Request $request, $id)
    {
        $merk_data    = MerkKategori::where('id', $id)->first();
        $merk_kategori    = $request->merk_kategori ?? $merk_data->merk_kategori;

        $merk = MerkKategori::where('id', $id)
                    ->update([
                        'merk_kategori'  => $merk_kategori,
                    ]);

        if ($merk !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/merk-kategori')
            ->withSuccess('You have Successfully updated kategori merk');

    }

    public function add(Request $request)
    {
        return view('admin.merk-kategori.add');
    }

    public function createNewMerkKategori(Request $request)
    {
        $merk_kategori    = $request->merk_kategori ?? '';

        $merk_kate = MerkKategori::create([
            'merk_kategori'  => $merk_kategori,
                            ]);

        return redirect()->intended('admin/merk-kategori')->withSuccess('You have Successfully added kategori merk '.$request->merk_kategori);
    }

    public function delete(Request $request)
    {
        $merk_kategori = MerkKategori::where('id', $request->id)->delete();
        return redirect()->intended('admin/merk-kategori')->withSuccess('You have Successfully deleted kategori merk '.$request->id );
    }
}
