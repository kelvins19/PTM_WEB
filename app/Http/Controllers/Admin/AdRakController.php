<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rak;

class AdRakController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';

        $raks = Rak::orderBy('id', 'ASC')
                    ->when($search != '', function ($q) use ($search) {
                        return $q->where('nama_rak', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(20);

        $raks = $raks->appends([
            'search'   => $request->input('search', ''),
        ]);

        return view('admin.rak.index')
                ->with('raks', $raks)
                ->with('search', $search);
    }

    public function edit(Request $request)
    {
        $rak = Rak::where('id', $request->id)->first();

        return view('admin.rak.edit')->with('rak', $rak);

    }

    public function update(Request $request, $id)
    {
        $rak_data    = Rak::where('id', $id)->first();
        $rak_code    = $request->rak_code ?? $rak_data->nama_rak;
        $deskripsi   = $request->desc ?? $rak_data->deskripsi;

        $rak = Rak::where('id', $id)
                    ->update([
                        'nama_rak'      => $rak_code,
                        'deskripsi'     => $deskripsi,
                    ]);

        if ($rak !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/rak')
            ->withSuccess('You have Successfully updated rak');

    }

    public function add(Request $request)
    {
        return view('admin.rak.add');
    }

    public function createNewRak(Request $request)
    {
        $rak_code    = $request->rak_code ?? '';
        $deskripsi   = $request->desc ?? '';

        $customer = Rak::create([
                                'nama_rak'      => $rak_code,
                                'deskripsi'     => $deskripsi,
                            ]);

        return redirect()->intended('admin/rak')->withSuccess('You have Successfully added rak '.$request->rak_code);
    }

    public function delete(Request $request)
    {
        $rak = Rak::where('id', $request->id)->delete();
        return redirect()->intended('admin/rak')->withSuccess('You have Successfully deleted rak '.$request->id );
    }
}