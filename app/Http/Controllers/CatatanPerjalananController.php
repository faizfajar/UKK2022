<?php

namespace App\Http\Controllers;
use App\Models\CatatanPerjalanan;

use Illuminate\Http\Request;


class CatatanPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatan  = CatatanPerjalanan::all();
        return view ('catatanperjalanan.index',compact('catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catatanperjalanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
            'suhu' => 'required',
        ]);
        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $id)
    {
        return view('kategori.edit', compact('kategori'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request,$id);
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);
        kategori::find($id)->update($request->all());

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $id)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('succes','Data Berhasil di Hapus');
    }
}
