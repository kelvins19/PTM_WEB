<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Merk;
use App\Models\MerkKategori;
use App\Models\MerkSubKategori;

class AdPelangganController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->search ? $request->search : '';
        $daerah_q = $request->daerah ? $request->daerah : '';

        $daerah = Pelanggan::groupBy('daerah')->orderBy('daerah')->pluck('daerah')->toArray();

        $customers = Pelanggan::orderBy('id', 'ASC')
                        ->when($search != '', function ($q) use ($search) {
                            return $q->where('nama_pelanggan', 'LIKE', '%'.$search.'%');
                        })
                        ->when($daerah_q != '', function ($q) use ($daerah_q) {
                            return $q->where('daerah', $daerah_q);
                        })
                        ->paginate(30);

        $customers = $customers->appends([
            'search'   => $request->input('search', ''),
            'daerah_q' => $request->input('daerah', ''),
        ]);

        return view('admin.pelanggan.index')
                ->with('customers', $customers)
                ->with('daerah', $daerah)
                ->with('search', $search)
                ->with('daerah_q', $daerah_q);
    }

    public function edit(Request $request)
    {
        $customer = Pelanggan::where('id', $request->id)->first();

        return view('admin.pelanggan.edit')->with('customer', $customer);

    }

    public function update(Request $request, $id)
    {
        $customer_data  = Pelanggan::where('id', $id)->first();
        $nama_pelanggan = $request->nama ?? $customer_data->nama_pelanggan;
        $alamat         = $request->alamat ?? $customer_data->alamat;
        $daerah         = $request->daerah ?? $customer_data->daerah;

        $customer = Pelanggan::where('id', $id)
                            ->update([
                                'nama_pelanggan' => $nama_pelanggan,
                                'alamat'        => $alamat,
                                'daerah'        => $daerah
                            ]);

        if ($customer !== 1) {
            return response()->json(['message' => 'fail to update'], 400);
        }

        return redirect()->intended('admin/pelanggan')
                        ->withSuccess('You have Successfully updated planggan');
    }

    public function add(Request $request)
    {
        return view('admin.pelanggan.add');
    }

    public function createNewPelanggan(Request $request)
    {
        $nama_pelanggan = $request->nama ?? '';
        $alamat         = $request->alamat ?? '';
        $daerah         = $request->daerah ?? '';

        $customer = Pelanggan::create([
                                'nama_pelanggan' => $nama_pelanggan,
                                'alamat'        => $alamat,
                                'daerah'        => $daerah
                            ]);

        return redirect()->intended('admin/pelanggan')
                            ->withSuccess('You have Successfully created pelanggan');
    }

    public function delete(Request $request)
    {
        $customer = Pelanggan::where('id', $request->id)->delete();
        return redirect()->intended('admin/pelanggan')->withSuccess('You have Successfully deleted pelanggan '.$request->id );
    }
}
