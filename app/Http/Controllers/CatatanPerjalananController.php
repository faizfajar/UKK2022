<?php

namespace App\Http\Controllers;
use App\Models\CatatanPerjalanan;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\DataTables;
use datatables;
// use Illuminate\Support\Facades\Auth;

class CatatanPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $catatan = CatatanPerjalanan::all();
        // dd($catatan);
        // dd($request);
        if ($request->ajax()) {
            $catatan = CatatanPerjalanan::latest()->get();
        // dd($catatan);
            return datatables::of($catatan)
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
        CatatanPerjalanan::create($request->only([
            'tanggal',
            'waktu',
            'lokasi',
            'suhu',
        ]));
        return redirect()->route('catataperjalanan.index');
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
