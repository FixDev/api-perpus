<?php

namespace App\Http\Controllers;
use App\Buku;
use Illuminate\Http\Request;

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
    public function index(){
        $buku = Buku::all();
         return response()->json($buku);
    }

    public function create(Request $request)
    {
       $buku = new Buku;

      $buku->judul= $request->judul;
      $buku->deskripsi = $request->deskripsi;
      $buku->penulis = $request->penulis;
      $buku->gambar = $request->gambar;
      $buku->Buku_id = $request->Buku_id;
      
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
       $buku= Buku::find($id);
       
       $buku->judul = $request->input('judul');
       $buku->deskripsi = $request->input('diskripsi');
       $buku->penulis = $request->input('penulis');
       $buku->gambar = $request->input('gambar');
       $buku->Buku_id = $request->input('Buku_id');
       
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
