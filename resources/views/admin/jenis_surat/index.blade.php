@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Jenis Surat</h5>
        </div>

        <div class="row">
            <div class="col-4 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <form action="#">
                            <input type="hidden" id="id">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Surat</label>
                                    <div class="form-icon position-relative">
                                        <input name="jenis_surat" id="jenis_surat" class="form-control"
                                            placeholder="Jenis Surat">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" id="buttonSimpan" class="btn btn-primary">Input
                                    Data</button>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-grid">
                                        <button id="resetButton" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-grid">
                                        <button id="deleteButton" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <div class="table-responsive shadow rounded-bottom p-2">
                            <table id="TableJenisSurat" class="table table-center display bg-white mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Jenis Surat</th>
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
                $('#resetButton').click(function() {
                    resetForm();
                });
                let table = new DataTable('#TableJenisSurat', {
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
                    ajax: "{{ route('jenisSurat.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'jenis_surat',
                            name: 'jenis_surat'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                });

                $('#TableJenisSurat').on('click', '.edit', function() {
                    var id = $(this).data('id');

                    $.get("{{ url('admin/jenis_surat') }}/" + id, function(data) {
                        $('#id').val(data.id);
                        $('#jenis_surat').val(data.jenis_surat);
                        $('#buttonSimpan').text('Update Data'); // Update button text to 'Update Data'
                    });
                });

                $("#deleteButton").on("click", function(e) {
                    let foreachData = [];
                    let selectedRowsData = table.rows('.selected').data();
                    selectedRowsData.each(function(rowData) {
                        foreachData.push(rowData.id);
                    });
                    let token = $("meta[name='csrf-token']").attr("content");
                    $.ajax({
                        url: "{{ route('jenisSurat.delete') }}",
                        type: 'DELETE',
                        data: {
                            ids: foreachData.join(","),
                            "_token": token
                        },
                        success: function(response) {
                            toastr.success('Delete Jenis Surat Successfully');
                            table.ajax.reload();
                        },
                        error: function(err) {
                            console.error('Error:', err);
                        }
                    });

                });

                $('#buttonSimpan').click(function(e) {
                    e.preventDefault();

                    var id = $("#id").val();
                    var jenis_surat = $("#jenis_surat").val();
                    var type = id ? 'PUT' : 'POST';
                    var url = id ? "{{ url('admin/jenis_surat') }}/" + id : "{{ route('jenisSurat.store') }}";
                    let token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        type: type,
                        url: url,
                        data: {
                            "_token": token,
                            'jenis_surat': jenis_surat
                        },
                        success: function(res) {
                            toastr.success(res.success);
                            table.ajax.reload();
                            resetForm();
                        },
                        error: function(xhr) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            if (typeof errors === 'object') {
                                for (var key in errors) {
                                    if (errors.hasOwnProperty(key)) {
                                        errorMessage += errors[key].join('<br>') + '<br>';
                                    }
                                }
                            } else {
                                errorMessage = 'Validation Error. Please check your input.';
                            }
                            toastr.error(errorMessage);
                        }
                    });
                });

                function resetForm() {
                    $('#id').val("");
                    $('#jenis_surat').val("");
                    updateButtonText();
                }

                function updateButtonText() {
                    const idInput = document.getElementById('id');
                    const submitButton = document.getElementById('buttonSimpan');
                    if (idInput.value === "") {
                        submitButton.textContent = 'Input Data';
                    } else {
                        submitButton.textContent = 'Update Data';
                    }
                }

                document.getElementById('id').addEventListener('input', updateButtonText);
                updateButtonText();
            });
        </script>
    </div>
@endsection
