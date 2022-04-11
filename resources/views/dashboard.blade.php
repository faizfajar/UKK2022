@extends('master')
@section('title')
@endsection
@section('content')
    <div class="card">
  <div class="card-body" style="height: 50vh">
        <div class="div" style="margin: 5%;padding:5%;align-items:center">

            <div class="col-8">
                                    @php
                                    $file = (isset($getImg->file)) ? $getImg->file : asset("assets/img/default.jpg");
                                    // dd($getImg->file);

                                    if(file_exists($file)){
                                    $img = asset($getImg->file);
                                    // dd($img);
                                    }else{
                                    $img = asset("assets/img/default.jpg");
                                    }

                                    @endphp
                                    <img src="{{ $img }}" class="brround"
                                        style="height: 60px; width:65px; margin-left:70px; margin-top:30px"
                                        alt="User Avatar">
                                </div>

            <h2>Selamat Datang Di Aplikasi Peduli Diri!!</h2>
            <h4>You sign in as a {{ Auth::user()->name}}</h4>
            <h4>Your NIK number is {{ Auth::user()->nik}}</h4>

            <div class="text-center">
                  <label class="col-form-label text-bold"> <a href="{{route('history')}}"> Review ur History </a></label>
            </div>

  </div>
</div>
@endsection
