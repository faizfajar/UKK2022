@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-10">Data Table</h6>
            <div class="table-wrapper table-responsive">
                <table class="table" id="showresult">
                    <thead>
                        <tr>
                            <th><h6>Tanggal</h6></th>
                            <th><h6>Waktu</h6></th>
                            <th><h6>Lokasi</h6></th>
                            <th><h6>Suhu Tubuh</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
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
@section('script')
    

    <script>
             $(document).ready(function() {
                 
                let table = new DataTable('#showresult')({
                ajax: "{{ route('catatanperjalanan.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'waktu', name: 'waktu'},
                    {data: 'lokasi', name: 'lokasi'},
                    {data: 'suhu', name: 'suhu'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

                $('body').on('click', '.delete-user', function() {
                    var id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    confirm("Apakah kamu yakin menghapus ini?");

                    let url = `{{ route('catatanperjalanan.destroy', ':id') }}`;
                    url = url.replace(':id', id);

                    $.ajax({
                        method: "DELETE",
                        url: url,
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function(data) {
                            table.ajax.reload();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                });

            $('body').on('click', '.edit-user', function() {
                    var id = $(this).data("id");
                    let url = `{{ route('catatanperjalanan.edit', ':id') }}`;
                    url = url.replace(':id', id);

                    window.location = url
                });
            });
        </script>
    @endsection