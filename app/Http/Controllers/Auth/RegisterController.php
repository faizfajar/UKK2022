<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\CatatanPerjalanan;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $file = $data;
    //    $con Storage::disk('my_disk');
        // $file = fopen('/storage/app/user-created.txt',"User Yang berhasil Daftar");
        // fwrite($file, `'$data'`);
        // fclose($file);
        // $file = 'Nama Lengkap ' . $file->name . ', NIK ' . $file->nik . ', Email ' . $file->email . ', Password ' . $file->password ;
        $file = '' .'- Nama Lengkap ' . $file['name'] . ' | Email ' . $file['email'] . '| NIK ' . $file['nik']  . '| Password ' . $file['password'] ;
        Storage::disk('local')->append('user-created.txt', $file);
        // $email = 'Email' .  $file->email . "</br>" .;
        // $password = 'Password' .  $file->password . "</br>" .;
        // Storage::disk('local')->put('file.txt', 'Your content here');

        return User::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
