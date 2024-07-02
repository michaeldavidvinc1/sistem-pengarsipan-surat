@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Petugas</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <div class="mb-3">
                            <a href="{{ route('petugasUser.create') }}" class="btn btn-primary btn-sm">Tambah Petugas</a>
                            <button class="btn btn-danger btn-sm" id="deleteButton">Hapus</button>
                        </div>
                        <div class="table-responsive shadow rounded-bottom p-2">
                            <table id="tablePetugas" class="table table-center bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Role</th>
                                        <th>Jabatan</th>
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
                let table = new DataTable('#tablePetugas', {
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
                        url: "{{ route('petugasUser.index') }}",
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
                            data: 'nama_lengkap',
                            name: 'nama_lengkap'
                        },
                        {
                            data: 'username',
                            name: 'username'
                        },
                        {
                            data: function(data) {
                                if (data.jenis_kelamin == "L") {
                                    return 'Laki - Laki';
                                } else if (data.jenis_kelamin == "P") {
                                    return 'Perempuan';
                                } else {
                                    return ''
                                }
                            },
                            name: 'jenis_kelamin'
                        },
                        {
                            data: 'tgl_lahir',
                            name: 'tgl_lahir'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'telp',
                            name: 'telp'
                        },
                        {
                            data: 'role',
                            name: 'role'
                        },
                        {
                            data: function(data) {
                                if (data.jabatan == "staff_tu_yayasan") {
                                    return 'Staff TU Yayasan';
                                } else if (data.jabatan == "staff_tu_sma") {
                                    return 'Staff TU SMA';
                                } else if (data.jabatan == "staff_tu_smp") {
                                    return 'Staff TU SMP';
                                } else if (data.jabatan == "staff_tu_sd_tk") {
                                    return 'Staff TU SD Sampai TK'
                                } else {
                                    return ''
                                }
                            },
                            name: 'jabatan'
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
                        url: "{{ route('petugasUser.destroy') }}",
                        type: 'DELETE',
                        data: {
                            ids: foreachData.join(","),
                            "_token": token
                        },
                        success: function(response) {
                            toastr.success('Delete Petugas Successfully');
                            table.ajax.reload();
                        },
                        error: function(err) {
                            console.error('Error:', err);
                        }
                    });

                });

            });
        </script>
    </div>
@endsection
