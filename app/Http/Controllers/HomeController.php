<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatatanPerjalanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $data = User::all();
        $data = Auth::user();
        // dd($data);

        return view('dashboard',compact('data'));
    }

    public function register(){
        return view('customlogin\register');
    }
}
