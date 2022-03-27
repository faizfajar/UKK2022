@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <div class="row g-3 mb-2 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label">Filter Berdasarkan Tanggal</label>
                    <a href="{{route('catatanperjalanan.create')}}">Add new Data</a>
                </div>
                <div class="row">
                        <div class="col-auto">
                    <input type="date" class="form-control" name="dari" id="dari" required>
                </div>
                <div class="col-auto">
                    -
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="ke" id="ke" required>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit" id="filter" >Cari</button>
                </div>
                </div>
            </div>

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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

    <script type="text/javascript">
        $(document).ready(function () {
            const table = $('#showresult').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('catatanperjalanan.index') }}",
                    data: function(d) {
                        d.dari = $('#dari').val();
                        d.ke = $('#ke').val();
                    },
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'jam', name: 'jam'},
                    {data: 'lokasi', name: 'email'},
                    {data: 'suhu', name: 'suhu'},
                    {data: 'action', name: 'action', orderable: true,  searchable: true },
                ]
            });

            $('body').on('click', '#filter', function() {
                // table.data.reload();
                // $('#showresult').data.reload();
                $('#showresult').DataTable().ajax.reload();
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
