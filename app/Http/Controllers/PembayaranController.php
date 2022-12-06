<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    
    public function index()
    {
        $datas = DB::select('select * from pembayaran where deleted_at is null');
        return view('pembayaran.index')

            ->with('datas', $datas);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $datas = DB::table('pembayaran')->where('deleted_at', NULL)->where('id_bayar', 'LIKE', '%' . $keyword . '%')->orWhere('id_service', 'LIKE', '%' . $keyword . '%')->orWhere('tgl_bayar', 'LIKE', '%' . $keyword . '%')
            ->orWhere('total_bayar', 'LIKE', '%' . $keyword . '%')->get();
        return view('pembayaran.index')
            ->with('datas', $datas);
    }
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('pembayaran')->where('deleted_at', '<>', '' )->where('nama', 'LIKE', '%'.$get_nama.'%')->get();
        return view('pembayaran.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE pembayaran SET deleted_at=null WHERE id_bayar = :id_bayar', ['id_bayar' => $id]);
        return redirect()->route('pembayaran.trash');
    }
    public function trash()
    {
        $datas = DB::select('select * from pembayaran where deleted_at is not null');
        return view('pembayaran.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE pembayaran SET deleted_at=current_timestamp() WHERE id_bayar = :id_bayar', ['id_bayar' => $id]);
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus');
    }

    public function create()
    {
        return view('pembayaran.add');
    }
    public function store(Request $request)
    {
        $request->validate([

            'id_bayar' => 'required',
            'id_service' => 'required',
            'id_sparepart' => 'required',
            'tgl_bayar' => 'required',
            'total_bayar' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Name Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO pembayaran(id_bayar, id_service, id_sparepart, tgl_bayar, total_bayar) VALUES
            (:id_bayar, :id_service, :id_sparepart, :tgl_bayar, :total_bayar)',
            [
                'id_bayar' => $request->id_bayar,
                'id_service' => $request->id_service,
                'id_sparepart' => $request->id_sparepart,
                'tgl_bayar' => $request->tgl_bayar,
                'total_bayar' => $request->total_bayar,
            ]
        );
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil disimpan');
    }
    public function edit($id)
    {
        $data = DB::table('pembayaran')->where(
            'id_bayar',
            $id
        )->first();
        return view('pembayaran.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_bayar' => 'required',
            'id_service' => 'required',
            'id_sparepart' => 'required',
            'tgl_bayar' => 'required',
            'total_bayar' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('pembayaran')->where('id_bayar', $request->id)->update([
            'id_bayar' => $request->id_bayar,
            'id_service' => $request->id_service,
            'id_sparepart' => $request->id_sparepart,
            'tgl_bayar' => $request->tgl_bayar,
            'total_bayar' => $request->total_bayar,
        ]);
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diubah');
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembayaran WHERE id_bayar =
                    :id_bayar', ['id_bayar' => $id]);
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus');
    }
}
