@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <h6 class="mb-10 text-light" > <a href="#"  class="btn btn-secondary rounded-3">Input new Data</a></h6>
            <div class="table-wrapper table-responsive">
                <table class="table" id="showresult">
                    <thead>
                        <tr>
                            <td>no</td>
                            <td>Tanggal</td>
                            <td>Waktu</td>
                            <td>Lokasi</td>
                            <td>Suhu Tubuh</td>
                            <td>Action</td>
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

    <script type="text/javascript">
             $(document).ready(function () {
                var table = $('#showresult').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('catatanperjalanan.index') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'tanggal', name: 'tanggal'},
                        {data: 'jam', name: 'jam'},
                        {data: 'lokasi', name: 'email'},
                        {data: 'suhu', name: 'suhu'},
                        {data: 'action', name: 'action', orderable: true,  searchable: true },
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
