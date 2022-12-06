<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{

    public function index()
    {
        $datas = DB::select('select * from service where deleted_at is null');
        return view('service.index')

            ->with('datas', $datas);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $datas = DB::table('service')->where('deleted_at', NULL)->where('keluhan', 'LIKE', '%' . $keyword . '%')->orWhere('tindakan_service', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jenis_service', 'LIKE', '%' . $keyword . '%')->get();
        return view('service.index')
            ->with('datas', $datas);
    }
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('service')->where('deleted_at', '<>', '' )->where('nama', 'LIKE', '%'.$get_nama.'%')->get();
        return view('service.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE service SET deleted_at=null WHERE id_service = :id_service', ['id_service' => $id]);
        return redirect()->route('service.trash');
    }
    public function trash()
    {
        $datas = DB::select('select * from service where deleted_at is not null');
        return view('service.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE service SET deleted_at=current_timestamp() WHERE id_service = :id_service', ['id_service' => $id]);
        return redirect()->route('service.index')->with('success', 'Data service berhasil dihapus');
    }
    public function create()
    {
        return view('service.add');
    }
    public function store(Request $request)
    {
        $request->validate([

            'id_service' => 'required',
            'id_konsumen' => 'required',
            'keluhan' => 'required',
            'tindakan_service' => 'required',
            'jenis_service' => 'required',
            'tgl_service' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Name Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO service(id_service, id_konsumen, keluhan, tindakan_service, jenis_service, tgl_service) VALUES
            (:id_service, :id_konsumen, :keluhan, :tindakan_service, :jenis_service, :tgl_service)',
            [
                'id_service' => $request->id_service,
                'id_konsumen' => $request->id_konsumen,
                'keluhan' => $request->keluhan,
                'tindakan_service' => $request->tindakan_service,
                'jenis_service' => $request->jenis_service,
                'tgl_service' => $request->tgl_service,
            ]
        );
        return redirect()->route('service.index')->with('success', 'Data service berhasil disimpan');
    }
    public function edit($id)
    {
        $data = DB::table('service')->where(
            'id_service',
            $id
        )->first();
        return view('service.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_service' => 'required',
            'id_konsumen' => 'required',
            'keluhan' => 'required',
            'tindakan_service' => 'required',
            'jenis_service' => 'required',
            'tgl_service' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::table('service')->where('id_service', $request->id)->update([
            'id_service' => $request->id_service,
            'id_konsumen' => $request->id_konsumen,
            'keluhan' => $request->keluhan,
            'tindakan_service' => $request->tindakan_service,
            'jenis_service' => $request->jenis_service,
            'tgl_service' => $request->tgl_service,
        ]);
        return redirect()->route('service.index')->with('success', 'Data service berhasil diubah');
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM service WHERE id_service =
                    :id_service', ['id_service' => $id]);
        return redirect()->route('service.index')->with('success', 'Data service berhasil dihapus');
    }
}
