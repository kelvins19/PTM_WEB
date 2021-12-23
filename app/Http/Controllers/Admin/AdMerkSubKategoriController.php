<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\MerkKategori;
use App\Models\MerkSubKategori;

class AdMerkSubKategoriController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';

        $merks = MerkSubKategori::orderBy('id', 'ASC')
                    ->when($search != '', function ($q) use ($search) {
                        return $q->where('merk_subkategori', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(20);

        $merks = $merks->appends([
            'search'   => $request->input('search', ''),
        ]);

        return view('admin.merk-subkategori.index')
                ->with('merks', $merks)
                ->with('search', $search);
    }

    public function edit(Request $request)
    {
        $merk = MerkSubKategori::where('id', $request->id)->first();

        return view('admin.merk-subkategori.edit')->with('merk', $merk);

    }

    public function update(Request $request, $id)
    {
        $merk_data    = MerkSubKategori::where('id', $id)->first();
        $merk_subkategori    = $request->merk_subkategori ?? $merk_data->merk_subkategori;

        $merk = MerkSubKategori::where('id', $id)
                    ->update([
                        'merk_subkategori'  => $merk_subkategori,
                    ]);

        if ($merk !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/merk-subkategori')
            ->withSuccess('You have Successfully updated subkategori merk');

    }

    public function add(Request $request)
    {
        return view('admin.merk-subkategori.add');
    }

    public function createNewMerkSubKategori(Request $request)
    {
        $merk_subkategori    = $request->merk_subkategori ?? '';

        $merk_subkate = MerkSubKategori::create([
            'merk_subkategori'  => $merk_subkategori,
                            ]);

        return redirect()->intended('admin/merk-subkategori')->withSuccess('You have Successfully added subkategori merk '.$request->merk_subkategori);
    }

    public function delete(Request $request)
    {
        $merk_subkategori = MerkSubKategori::where('id', $request->id)->delete();
        return redirect()->intended('admin/merk-subkategori')->withSuccess('You have Successfully deleted kategori merk '.$request->id );
    }
}
