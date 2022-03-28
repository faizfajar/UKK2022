<?php

namespace App\Http\Controllers;
use App\Models\CatatanPerjalanan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
// use Yajra\DataTables\Facades\DataTables
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;


class CatatanPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filter(){
        return view('catatanperjalanan.index',compact('data'));
    }

    public function index(Request $request)
    {
        // $catatan = CatatanPerjalanan::all();
        // Storage::disk('local')->put('user-created', 'User Yang berhasil Daftar');
        // dd($catatan);
        // dd($request);
        if ($request->ajax()) {
            $dari = $request->get('dari');
            $ke = $request->get('ke');

            if ($dari && $ke) {
                $catatan = CatatanPerjalanan::whereBetween('tanggal', [$dari, $ke])->get();
            } else {
                $catatan = CatatanPerjalanan::all();
            }

            return Datatables::of($catatan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $action = '
                        <a class="btn btn-success edit-user" id="edit-user" data-toggle="modal" data-id=' . $row->id . '>Edit </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a id="delete-user" data-id=' . $row->id . ' class="btn btn-danger delete-user">Delete</a>
                    ';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('catatanperjalanan.index');
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
        // dd($request);
        CatatanPerjalanan::create($request->only([
            'tanggal',
            'jam',
            'lokasi',
            'suhu',
        ]));
        return redirect()->route('catatanperjalanan.index');
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
    public function edit($id)
    {
        $data = CatatanPerjalanan::find($id);
        return view('catatanperjalanan.edit', compact('data', 'id'));
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
        CatatanPerjalanan::find($id)->update($request->all());
        // dd($request,$id);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('catatanperjalanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CatatanPerjalanan::find($id)->delete();

        return response()->json([
            'status' => 'FAIL'
        ]);
    }
}
