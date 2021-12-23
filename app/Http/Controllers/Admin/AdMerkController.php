<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merk;
use App\Models\MerkKategori;
use App\Models\MerkSubKategori;

class AdMerkController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';

        $merks = Merk::orderBy('id', 'ASC')
                    ->when($search != '', function ($q) use ($search) {
                        return $q->where('nama_merk', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(20);

        $merks = $merks->appends([
            'search'   => $request->input('search', ''),
        ]);

        return view('admin.merk.index')
                ->with('merks', $merks)
                ->with('search', $search);
    }

    public function edit(Request $request)
    {
        $merk = Merk::where('id', $request->id)->first();

        return view('admin.merk.edit')->with('merk', $merk);

    }

    public function update(Request $request, $id)
    {
        $merk_data    = Merk::where('id', $id)->first();
        $nama_merk    = $request->nama_merk ?? $merk_data->nama_merk;

        $merk = Merk::where('id', $id)
                    ->update([
                        'nama_merk'  => $nama_merk,
                    ]);

        if ($merk !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/merk')
            ->withSuccess('You have Successfully updated merk');

    }

    public function add(Request $request)
    {
        return view('admin.merk.add');
    }

    public function createNewMerk(Request $request)
    {
        $nama_merk    = $request->nama_merk ?? '';

        $merk = Merk::create([
                        'nama_merk'  => $nama_merk,
                    ]);

        return redirect()->intended('admin/merk')->withSuccess('You have Successfully added kategori merk '.$request->nama_merk);
    }

    public function delete(Request $request)
    {
        $merk = Merk::where('id', $request->id)->delete();
        return redirect()->intended('admin/merk')->withSuccess('You have Successfully deleted kategori merk '.$request->id );
    }
}
