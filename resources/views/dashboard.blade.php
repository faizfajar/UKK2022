@extends('master')
@section('title')
@endsection
@section('content')
    <div class="card">
      <h2 class="text-center" style="background-color:aliceblue" >Selamat Datang Di Aplikasi Peduli Diri.</h2>
  <div class="card-body" style="height: 50vh">
        <div class="div" style="margin: 5%;padding:5%;align-items:center">
        
          <div>
            @php
             $file = (isset($data->gambar)) ? asset('assets/img/' . $data->gambar) : asset("assets/img/default.jpg");
            @endphp
                    <img src="{{ $file }}" class="brround"
                        style="height: 60px; width:65px; margin-left:70px; margin-top:30px"
                        alt="User Avatar">
                        <h4>You sign in as a {{ Auth::user()->name}}</h4>
                        <h4>Your NIK number is {{ Auth::user()->nik}}</h4>
          </div>

            <div class="text-center">
                  <label class="col-form-label text-bold"> <a href="{{route('history')}}"> Review ur History </a></label>
            </div>

  </div>
</div>
@endsection
