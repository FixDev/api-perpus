<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        $kategori = Kategori::all();
        return response()->json($kategori);
    }

    public function create(Request $request)
    {
        $kategori = new Kategori;

        $kategori->judul = $request->judul;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->penulis = $request->penulis;
        $kategori->gambar = $request->gambar;
        $kategori->kategori_id = $request->kategori_id;

        $kategori->save();

        return response()->json($kategori);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);

        return response()->json($kategori);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        $kategori->judul = $request->judul;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->penulis = $request->penulis;
        $kategori->gambar = $request->gambar;
        $kategori->kategori_id = $request->kategori_id;

        $kategori->save();
        return response()->json($kategori);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return response()->json('Kategori removed successfully');
    }
}
