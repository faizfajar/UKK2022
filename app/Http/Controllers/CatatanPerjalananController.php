<?php

namespace App\Http\Controllers;
use App\Models\CatatanPerjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use \PDF;
// use PDF;
// use Yajra\DataTables\Facades\DataTables
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Support\Facades\Auth;



class CatatanPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function history(Request $request){
        // $catatan = Catatanperjalanan::all();
            // dd($catatan);
        if ($request->ajax()) {
            $dari = $request->get('dari');
            $ke = $request->get('ke');

            if ($dari && $ke) {
                $catatan = CatatanPerjalanan::whereBetween('tanggal', [$dari, $ke])->get();
            } else {
                // $catatan = CatatanPerjalanan::all();
                $catatan = Catatanperjalanan::where('user_id', Auth::user()->id)->latest()->get();
            }
            return Datatables::of($catatan)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($catatan) {
                    return '<input type="checkbox" id="' . $catatan->id . '" name="pdf_checkbox" class="pdf_checkbox" />';
                })
                ->make(true);
        }

        return view('catatanperjalanan.history');
    }

    public function filter(){
        return view('catatanperjalanan.index',compact('data'));
    }

    // public function showPDF()
    // {
    //     $data = CatatanPerjalanan::all();

    //     $pdf = PDF::loadview('catatanperjalanan.showpdf', ['data' => $data]);
    //     return $pdf->stream('laporan.pdf');
    // }
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
                // $catatan = CatatanPerjalanan::all();
                $catatan = Catatanperjalanan::where('user_id',Auth::user()->id)->latest()->get();

            }

            // dd($catatan);
            return Datatables::of($catatan)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($catatan) {
                    return '<input type="checkbox" id="' . $catatan->id . '" name="pdf_checkbox" class="pdf_checkbox" />';
                })
                 ->addColumn('suhu', function ($catatan) {
                    return $catatan->suhu . '&#8451';
                })
                ->addColumn('action', function ($row) {

                    $action = '
                        <a class="btn btn-success edit-user" id="edit-user" data-toggle="modal" data-id=' . $row->id . '>Edit </a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a id="delete-user" data-id=' . $row->id . ' class="btn btn-danger delete-user">Delete</a>
                    ';

                    return $action;
                })
                ->rawColumns(['action','checkbox','suhu'])
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
        $this->validate($request, [
            'tanggal'     => 'required',
            'jam'       => 'required',
            'lokasi'      => 'required|min:10',
            'suhu'  => 'required|min:2'
        ]);

       $data = $request->only([
            'tanggal',
            'jam',
            'lokasi',
            'suhu',
        ]);
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        CatatanPerjalanan::create($data);
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
