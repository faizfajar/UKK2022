<?php

use App\Http\Controllers\CatatanPerjalananController;
use App\Http\Controllers\HomeController;
use App\Models\CatatanPerjalanan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use PDF;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('login');

Auth::routes();

// Route::group(]);

Route::resource('catatanperjalanan', CatatanPerjalananController::class);
Route::get('/filtertanggal', [App\Http\Controllers\CatatanPerjalananController::class, 'filter'])->name('filter');

// Route::get('dashboard', HomeController::class, 'dashboard' )->name('dashboard');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('history', [ App\Http\Controllers\CatatanPerjalananController::class, 'history'])->name('history');
// Route::get('cetakpdf', [App\Http\Controllers\CatatanPerjalananController::class, 'showPDF'])->name('cetakpdf');
Route::get('cetakpdf', function (Request $request) {
    // dd($request);
			$explodeproduct = explode(',', $request->cetakpdf);
            // dd($explodeproduct);
			// dd($test);
			// $product = Product::all();

			$catatan = CatatanPerjalanan::whereIn('id', $explodeproduct)->get();
			// $product = Product::whereIn('id',[$request->data_id])->get();
			// dd($request, $product);
			$pdf = PDF::loadView('catatanperjalanan.showpdf', ['catatan' => $catatan])->setOptions(['defaultFont' => 'sans-serif']);
            // dd($pdf);
			if ($request->download) {
				//return view('products.barcode')->with('product', $product);
				return $pdf->download('laporan_' . date('Y-m-dHis') . '.pdf');
			}
			//
			return view('catatanperjalanan.showpdf')->with('catatan', $catatan);
		});


