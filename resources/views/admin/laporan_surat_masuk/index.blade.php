@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Laporan Surat Masuk</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow mb-2">
                    <div class="p-4">
                        <div>
                            <h6>Buat Laporan</h6>
                            <div>
                                <a href="#" class="btn btn-primary btn-sm">Bulan Ini</a>
                                <a href="#" class="btn btn-primary btn-sm">Minggu Ini</a>
                                <a href="#" class="btn btn-primary btn-sm">Hari Ini</a>
                                <a href="#" class="btn btn-primary btn-sm">Bulan Kemarin</a>
                                <a href="#" class="btn btn-primary btn-sm">Kemarin</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6>Berdasarkan status disposisi</h6>
                            <div class="col-3">
                                <select class="form-select form-control" id="status_disposisi"
                                    aria-label="Default select example">
                                    <option value="" selected>-- Status Disposisi --</option>
                                    <option value="sudah">Sudah</option>
                                    <option value="belum">Belum</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6>Berdasarkan Rentang Tanggal Surat</h6>
                            <div class="row">
                                <div class="col-2">
                                    <div class="mb-3">
                                        <div class="form-icon position-relative">
                                            <input id="min-date" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <div class="form-icon position-relative">
                                            <input id="max-date" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="btn btn-primary btn-sm">Cetak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded shadow">
                    <div class="p-4">
                        <div class="table-responsive shadow rounded-bottom p-2">
                            <table id="tableLaporanSuratMasuk" class="table table-center bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Perihal</th>
                                        <th>Jenis Surat</th>
                                        <th>Asal Surat</th>
                                        <th>Keterangan</th>
                                        <th>Berkas</th>
                                        <th>Status Disposisi</th>
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
                let table = new DataTable('#tableLaporanSuratMasuk', {
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
                        url: "{{ route('laporanSuratMasuk.index') }}",
                        data: function(d) {
                            d.min_date = $('#min-date').val();
                            d.max_date = $('#max-date').val();
                            d.status_disposisi = $('#status_disposisi').val();
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
                            data: function(data) {
                                let file = data.surat_masuk_id;
                                let url = "{{ route('laporansuratMasuk.preview', ':file') }}".replace(
                                    ':file',
                                    file);
                                return '<a href="' + url + '" target="_blank">Download</a>';
                            },
                            name: 'berkas_sm'
                        },
                        {
                            data: 'status_disposisi',
                            name: 'status_disposisi'
                        },
                    ],
                });
                $('#min-date, #max-date, #status_disposisi').on('change', function() {
                    table.draw();
                });

            });
        </script>
    </div>
@endsection
