@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Setting</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <form action="{{ route('setting.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Yayasan</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="nama_sekolah" value="{{ $data->nama_sekolah }}" id="nama_sekolah" class="form-control"
                                                placeholder="Nama Sekolah..." required>
                                            @error('nama_sekolah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pimpinan</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="nama_pimpinan" value="{{ $data->nama_pimpinan }}" id="nama_pimpinan" class="form-control"
                                                placeholder="Nama Pimpinan..." required>
                                            @error('nama_pimpinan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary btn-md" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
