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
                                <a href="#" id="bulanIni" class="btn btn-primary btn-sm">Bulan Ini</a>
                                <a href="#" id="mingguIni" class="btn btn-primary btn-sm">Minggu Ini</a>
                                <a href="#" id="hariIni" class="btn btn-primary btn-sm">Hari Ini</a>
                                <a href="#" id="bulanKemarin" class="btn btn-primary btn-sm">Bulan Kemarin</a>
                                <a href="#" id="kemarin" class="btn btn-primary btn-sm">Kemarin</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6>Berdasarkan Rentang Tanggal Surat</h6>
                            <div class="row">
                                <div class="col-2">
                                    <div class="mb-3">
                                        <div class="form-icon position-relative">
                                            <input name="name" id="min-date" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-3">
                                        <div class="form-icon position-relative">
                                            <input name="name" id="max-date" type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="#" id="cetak" class="btn btn-primary btn-sm">Cetak</a>
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
                                        <th>Tanggal Dikeluarkan</th>
                                        <th>Perihal</th>
                                        <th>Penerima</th>
                                        <th>Lokasi Surat</th>
                                        <th>Yang Menandatangani</th>
                                        <th>Berkas</th>
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
                        url: "{{ route('laporanSuratKeluar.index') }}",
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
                            data: 'no_sk',
                            name: 'no_sk'
                        },
                        {
                            data: 'tgl_dikeluarkan',
                            name: 'tgl_dikeluarkan'
                        },
                        {
                            data: 'perihal',
                            name: 'perihal'
                        },
                        {
                            data: 'penerima',
                            name: 'penerima'
                        },
                        {
                            data: 'lokasi_sk',
                            name: 'lokasi_sk'
                        },
                        {
                            data: 'yang_menandatangani',
                            name: 'yang_menandatangani'
                        },
                        {
                            data: function(data) {
                                let file = data.id;
                                let url = "{{ route('laporansuratKeluar.preview', ':file') }}".replace(
                                    ':file',
                                    file);
                                return '<a href="' + url + '" target="_blank">Download</a>';
                            },
                            name: 'berkas_sk'
                        },
                    ],
                });

                $('#min-date, #max-date').change(function() {
                    table.draw();
                });

                $('#cetak').click(function(e) {
                    e.preventDefault();

                    let min_date = $('#min-date').val();
                    let max_date = $('#max-date').val();

                    let url = "{{ route('laporanSuratKeluar.pdf') }}";

                    url += '?min_date=' + min_date + '&max_date=' + max_date;

                    window.location.href = url;
                });

                $('#bulanIni').click(function(e) {
                    e.preventDefault();

                    let url = "{{ route('bulanIniKeluar.pdf') }}";

                    window.location.href = url;
                });

                $('#mingguIni').click(function(e) {
                    e.preventDefault();

                    let url = "{{ route('mingguIniKeluar.pdf') }}";

                    window.location.href = url;
                });

                $('#hariIni').click(function(e) {
                    e.preventDefault();

                    let url = "{{ route('hariIniKeluar.pdf') }}";

                    window.location.href = url;
                });

                $('#bulanKemarin').click(function(e) {
                    e.preventDefault();

                    let url = "{{ route('bulanKemarinKeluar.pdf') }}";

                    window.location.href = url;
                });

                $('#kemarin').click(function(e) {
                    e.preventDefault();

                    let url = "{{ route('kemarinKeluar.pdf') }}";

                    window.location.href = url;
                });

            });
        </script>
    </div>
@endsection
