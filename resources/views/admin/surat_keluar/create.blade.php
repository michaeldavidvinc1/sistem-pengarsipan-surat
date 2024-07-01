@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Input Data Surat Keluar</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <a href="{{ route('suratKeluar.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('suratKeluar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No.Surat</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="no_sk" id="no_sk" class="form-control"
                                                placeholder="No Surat..." required>
                                            @error('no_sk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lokasi Berkas</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="lokasi_sk" id="lokasi_sk" class="form-control"
                                                placeholder="Lokasi Berkas..." required>
                                            @error('lokasi_sm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Perihal</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="perihal" id="perihal" class="form-control"
                                                placeholder="Perihal..." required>
                                            @error('perihal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Ketarangan</label>
                                        <div class="form-icon position-relative">
                                            <textarea name="keterangan" id="keterangan" rows="2" cols="1" class="form-control"
                                                placeholder="Keterangan..." required></textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Dikeluarkan</label>
                                        <div class="form-icon position-relative">
                                            <input type="date" name="tgl_dikeluarkan" id="tgl_dikeluarkan"
                                                class="form-control" required>
                                            @error('tgl_dikeluarkan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">File Berkas</label>
                                        <div class="form-icon position-relative">
                                            <input type="file" name="berkas_sk" id="berkas_sk" class="form-control"
                                                required>
                                            @error('berkas_sk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Penerima</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="penerima" id="penerima" class="form-control"
                                                placeholder="Penerima..." required>
                                            @error('penerima')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Yang Menandatangani</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="yang_menandatangani" id="yang_menandatangani"
                                                class="form-control" placeholder="Yang Menandatangani..." required>
                                            @error('yang_menandatangani')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary btn-md" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
