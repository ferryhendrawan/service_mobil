<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsumenController extends Controller
{
    public function index()
    {
        $datas = DB::select('select * from konsumen  where deleted_at is null');
        return view('konsumen.index')

            ->with('datas', $datas);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $datas = DB::table('konsumen')->where('deleted_at', NULL)->where('nama_konsumen', 'LIKE', '%' . $keyword . '%')->orWhere('Alamat', 'LIKE', '%' . $keyword . '%')->orWhere('keluhan', 'LIKE', '%' . $keyword . '%')->orWhere('jenis_kelamin', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jenis_mobil', 'LIKE', '%' . $keyword . '%')->get();
        return view('konsumen.index')
            ->with('datas', $datas);
    }
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('konsumen')->where('deleted_at', '<>', '' )->where('nama', 'LIKE', '%'.$get_nama.'%')->get();
        return view('konsumen.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE konsumen SET deleted_at=null WHERE id_konsumen = :id_konsumen', ['id_konsumen' => $id]);
        return redirect()->route('konsumen.trash');
    }
    public function trash()
    {
        $datas = DB::select('select * from konsumen where deleted_at is not null');
        return view('konsumen.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE konsumen SET deleted_at=current_timestamp() WHERE id_konsumen = :id_konsumen', ['id_konsumen' => $id]);
        return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil dihapus');
    }

    public function create()
    {
        return view('konsumen.add');
    }
    public function store(Request $request)
    {
        $request->validate([

            'id_konsumen' => 'required',
            'keluhan' => 'required',
            'nama_konsumen' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_mobil' => 'required',
            'Alamat' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Name Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO konsumen(id_konsumen, keluhan, nama_konsumen, jenis_kelamin, jenis_mobil, Alamat) VALUES
            (:id_konsumen, :keluhan, :nama_konsumen, :jenis_kelamin, :jenis_mobil, :Alamat)',
            [
                'id_konsumen' => $request->id_konsumen,
                'keluhan' => $request->keluhan,
                'nama_konsumen' => $request->nama_konsumen,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jenis_mobil' => $request->jenis_mobil,
                'Alamat' => $request->Alamat,
            ]
        );
        return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil disimpan');
    }
    public function edit($id)
    {
        $data = DB::table('konsumen')->where(
            'id_konsumen',
            $id
        )->first();
        return view('konsumen.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_konsumen' => 'required',
            'keluhan' => 'required',
            'nama_konsumen' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_mobil' => 'required',
            'Alamat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('konsumen')->where('id_konsumen', $request->id)->update([
            'id_konsumen' => $request->id_konsumen,
            'keluhan' => $request->keluhan,
            'nama_konsumen' => $request->nama_konsumen,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_mobil' => $request->jenis_mobil,
            'Alamat' => $request->Alamat,
        ]);
        return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil diubah');
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM konsumen WHERE id_konsumen =
                    :id_konsumen', ['id_konsumen' => $id]);
        return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil dihapus');
    }
}
