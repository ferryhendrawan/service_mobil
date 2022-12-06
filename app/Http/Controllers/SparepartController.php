<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SparepartController extends Controller
{
    public function index()
    {
        $datas = DB::select('select * from sparepart where deleted_at is null');
        return view('sparepart.index')

            ->with('datas', $datas);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $datas = DB::table('sparepart')->where('deleted_at', NULL)->where('name_sparepart', 'LIKE', '%' . $keyword . '%')->orWhere('Qty', 'LIKE', '%' . $keyword . '%')
            ->orWhere('harga_sparepart', 'LIKE', '%' . $keyword . '%')->get();
        return view('sparepart.index')
            ->with('datas', $datas);
    }
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('sparepart')->where('deleted_at', '<>', '' )->where('nama', 'LIKE', '%'.$get_nama.'%')->get();
        return view('sparepart.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE sparepart SET deleted_at=null WHERE id_sparepart = :id_sparepart', ['id_sparepart' => $id]);
        return redirect()->route('sparepart.trash');
    }
    public function trash()
    {
        $datas = DB::select('select * from sparepart where deleted_at is not null');
        return view('sparepart.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE sparepart SET deleted_at=current_timestamp() WHERE id_sparepart = :id_sparepart', ['id_sparepart' => $id]);
        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil dihapus');
    }
    public function create()
    {
        return view('sparepart.add');
    }
    public function store(Request $request)
    {
        $request->validate([

            'id_sparepart' => 'required',
            'name_sparepart' => 'required',
            'Qty' => 'required',
            'harga_sparepart' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Name Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO sparepart(id_sparepart, name_sparepart, Qty, harga_sparepart) VALUES
            (:id_sparepart, :name_sparepart, :Qty, :harga_sparepart)',
            [
                'id_sparepart' => $request->id_sparepart,
                'name_sparepart' => $request->name_sparepart,
                'Qty' => $request->Qty,
                'harga_sparepart' => $request->harga_sparepart,
            ]
        );
        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil disimpan');
    }
    public function edit($id)
    {
        $data = DB::table('sparepart')->where(
            'id_sparepart',
            $id
        )->first();
        return view('sparepart.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_sparepart' => 'required',
            'name_sparepart' => 'required',
            'Qty' => 'required',
            'harga_sparepart' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('sparepart')->where('id_sparepart', $request->id)->update([
            'id_sparepart' => $request->id_sparepart,
            'name_sparepart' => $request->name_sparepart,
            'Qty' => $request->Qty,
            'harga_sparepart' => $request->harga_sparepart,
        ]);
        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil diubah');
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM sparepart WHERE id_sparepart =
                    :id_sparepart', ['id_sparepart' => $id]);
        return redirect()->route('sparepart.index')->with('success', 'Data sparepart berhasil dihapus');
    }
}
