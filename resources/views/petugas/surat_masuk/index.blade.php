@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Surat Masuk</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <div class="mb-3">
                            <a href="{{ route('petugas.suratMasuk.create') }}" class="btn btn-primary btn-sm">Input Data</a>
                            <button class="btn btn-danger btn-sm" id="deleteButton">Hapus</button>
                            <button class="btn btn-secondary btn-sm" id="reset">Reset</button>
                        </div>
                        <div class="table-responsive shadow rounded-bottom p-2">
                            <div class="d-flex col-6 mb-3" style="float: right">
                                <input type="date" id="min-date" class="date-range-filter form-control">
                                <input type="date" id="max-date" class="date-range-filter form-control">
                            </div>
                            <table id="tableSuratMasuk" class="table table-center bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Perihal</th>
                                        <th>Jenis Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Keterangan</th>
                                        <th>Lokasi Berkas</th>
                                        <th>Berkas</th>
                                        <th>Disposisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.partials.jquery')
        <script>
            $(document).ready(function() {

                // window.moment = require('moment');
                let table = new DataTable('#tableSuratMasuk', {
                    processing: true,
                    serverSide: true,
                    paging: true,
                    searching: true,
                    language: {
                        info: 'Showing page _PAGE_ of _PAGES_',
                        lengthMenu: "Show _MENU_ Page",
                    },
                    select: {
                        style: 'multi'
                    },
                    autoWidth: false,
                    ajax: {
                        url: "{{ route('petugas.suratMasuk.index') }}",
                        data: function(d) {
                            d.min_date = $('#min-date').val();
                            d.max_date = $('#max-date').val();
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'no_sm',
                            name: 'no_sm'
                        },
                        {
                            data: 'tgl_surat',
                            name: 'tgl_surat'
                        },
                        {
                            data: 'perihal',
                            name: 'perihal'
                        },
                        {
                            data: 'jenis_surat',
                            name: 'jenis_surat'
                        },
                        {
                            data: 'asal_surat',
                            name: 'asal_surat'
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan'
                        },
                        {
                            data: 'lokasi_sm',
                            name: 'lokasi_sm'
                        },
                        {
                            data: function(data) {
                                let file = data.id;
                                let url = "{{ route('petugas.suratMasuk.preview', ':file') }}".replace(':file',
                                    file);
                                return '<a href="' + url + '" target="_blank">Download</a>';
                            },
                            name: 'berkas_sm'
                        },
                        {
                            data: 'status_disposisi',
                            name: 'status_disposisi'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                });
                $("#deleteButton").on("click", function(e) {
                    let foreachData = [];
                    let selectedRowsData = table.rows('.selected').data();
                    selectedRowsData.each(function(rowData) {
                        foreachData.push(rowData.id);
                    });
                    let token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ route('petugas.suratMasuk.destroy') }}",
                        type: 'DELETE',
                        data: {
                            ids: foreachData.join(","),
                            "_token": token
                        },
                        success: function(response) {
                            toastr.success('Delete Surat Masuk Successfully');
                            table.ajax.reload();
                        },
                        error: function(err) {
                            console.error('Error:', err);
                        }
                    });

                });
                $('#reset').click(function() {
                    $('#min-date').val("");
                    $('#max-date').val("");
                    table.ajax.reload();
                });
                $('#min-date, #max-date').change(function() {
                    table.draw();
                });

            });
        </script>
    </div>
@endsection
