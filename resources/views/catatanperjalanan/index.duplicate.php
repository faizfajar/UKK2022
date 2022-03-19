@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-10">Data Table</h6>
            <div class="table-wrapper table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6>Tanggal</h6>
                            </th>
                            <th>
                                <h6>Waktu</h6>
                            </th>
                            <th>
                                <h6>Lokasi</h6>
                            </th>
                            <th>
                                <h6>Suhu Tubuh</h6>
                            </th>
                            <th>
                                <h6>Action</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- end table -->
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection