@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Add New Data</h4>
        </div>
        <div class="card-body">
            <form action="{{route('catatanperjalanan.store')}}" method="post" class="card">
                @csrf
                <!-- Nama Singkat Komli -->
                 <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group pl-5 pr-5 pt-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal', '') }}" placeholder="Tanggal" required>
                </div>

                <!-- NIPD -->
                <div class="form-group pl-5 pr-5">
                    <label for="jam">Waktu</label>
                    <input type="time" class="form-control" name="jam" id="jam" value="{{ old('jam', '') }}" placeholder="Waktu Pengisian" required>
                </div>

                {{-- nama --}}
                <div class="form-group pl-5 pr-5">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ old('lokasi', '') }}" placeholder="Lokasi yang dituju" required>
                </div>

                <!-- Tempat Lahir -->
                <div class="form-group pl-5 pr-5">
                    <label for="suhu">Suhu Tubuh</label>
                    <input type="number" class="form-control" name="suhu" id="suhu" value="{{ old('suhu', '') }}" placeholder="Suhu Tubuh" required>
                </div>
                <!-- Button -->
                <button type="submit" class="btn mx-auto btn-primary mb-3">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
