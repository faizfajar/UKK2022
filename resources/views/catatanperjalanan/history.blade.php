@extends('master')
@section('title')
<div class="title mb-30">
    <h3>History Catatan Perjalanan</h3>

</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card-style mb-30">
            <div class="row g-3 mb-2 align-items-center">
                <div>
                    <label class="col-form-label text-bold">Filter Berdasarkan Tanggal</label>
                    <a href="{{url('cetakpdf')}}" id="cetakpdf" >Cetak PDF</a>
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

            <div class="table-wrapper">
                <table class="table" id="showresult">
                    <thead>
                        <tr>
                            <td></td>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Waktu</td>
                            <td>Lokasi</td>
                            <td>Suhu Tubuh</td>
                            {{-- <td>Action</td> --}}
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
                    {data: 'checkbox', name: 'checkbox' },
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'jam', name: 'jam'},
                    {data: 'lokasi', name: 'email'},
                    {data: 'suhu', name: 'suhu' },
                    // {data: 'action', name: 'action', orderable: true,  searchable: true },
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
    <script>

        let data = [];
    //     $(document).on('click', '.pdf_checkbox', function() {
    //     if ($(this).is(":checked")) {
    //         data.push(
    //             $(this).attr('id')
    //         )
    //     } else {
    //         let index = data.indexOf($(this).attr('id'));
    //         data.splice(index, 1);
    //     }

    //     console.log(data);
    // });

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#cetakpdf').on('click', function(e) {
            e.preventDefault();
            $(".pdf_checkbox:checked").each(function() {
                data.push($(this).attr('id'));
            });

            // console.log(data);
            if (data.length <= 0) {
                alert("Please select records.");
            } else {
                let selected_values = data.join(',');
                let url = $(this).attr('href');
                window.location.href = url + `?cetakpdf=${selected_values}&download=true`;
            }

        });

    });

// </script>
    @endsection
