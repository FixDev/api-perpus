<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function index()
    {
        $buku = DB::table('buku')
        ->join('kategori', 'buku.id', '=', 'kategori.buku_id' )
        ->select('buku.*', 'kategori.nama')
        ->get();
        return response()->json($buku);
    }

    public function create(Request $request)
    {
        $buku = new Buku;

        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->penulis = $request->penulis;
        $buku->gambar = $request->gambar;
        $buku->kategori_id = $request->kategori_id;

        $buku->save();

        return response()->json($buku);
    }

    public function show($id)
    {
        $buku = Buku::find($id);

        return response()->json($buku);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->penulis = $request->penulis;
        $buku->gambar = $request->gambar;
        $buku->kategori_id = $request->kategori_id;

        $buku->save();
        return response()->json($buku);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return response()->json('Buku removed successfully');
    }
}
