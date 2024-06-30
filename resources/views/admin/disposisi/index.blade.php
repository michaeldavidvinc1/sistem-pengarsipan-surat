@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Disposisi Surat Masuk</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <div class="mb-3">
                            <a href="{{ route('disposisi.create') }}" class="btn btn-primary btn-sm">Buat Disposisi</a>
                            <button class="btn btn-danger btn-sm" id="deleteButton">Hapus</button>
                            <button class="btn btn-secondary btn-sm" id="reset">Reset</button>
                        </div>
                        <div class="table-responsive shadow rounded-bottom p-2">
                            <div class="d-flex col-6 mb-3" style="float: right">
                                <input type="date" id="min-date" class="date-range-filter form-control">
                                <input type="date" id="max-date" class="date-range-filter form-control">
                            </div>
                            <table id="tableDisposisi" class="table table-center bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Tanggal Diposisi</th>
                                        <th>Dari</th>
                                        <th>Kepada</th>
                                        <th>Keterangan</th>
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
                let table = new DataTable('#tableDisposisi', {
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
                        url: "{{ route('disposisi.index') }}",
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
                            data: 'tgl_disposisi',
                            name: 'tgl_disposisi'
                        },
                        {
                            data: 'asal_surat',
                            name: 'asal_surat'
                        },
                        {
                            data: 'penerima_disposisi',
                            name: 'penerima_disposisi'
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan'
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
                        url: "{{ route('disposisi.destroy') }}",
                        type: 'DELETE',
                        data: {
                            ids: foreachData.join(","),
                            "_token": token
                        },
                        success: function(response) {
                            toastr.success('Delete Disposisi Successfully');
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
