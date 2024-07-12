@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Input Data Surat Masuk</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <a href="{{ route('petugas.suratMasuk.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('petugas.suratMasuk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No.Surat</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="no_sm" id="no_sm" class="form-control"
                                                placeholder="No Surat..." required>
                                            @error('no_sm')
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
                                        <label class="form-label">Lokasi Berkas</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="lokasi_sm" id="lokasi_sm" class="form-control"
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
                                        <label class="form-label">Tanggal Surat</label>
                                        <div class="form-icon position-relative">
                                            <input type="date" name="tgl_surat" id="tgl_surat" class="form-control"
                                                required>
                                            @error('tgl_surat')
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
                                            <input type="file" name="berkas_sm" id="berkas_sm" class="form-control"
                                                required>
                                            @error('berkas_sm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Surat</label>
                                        <div class="form-icon position-relative">
                                            <select class="form-select form-control" name="jenis_surat_id"
                                                aria-label="Default select example">
                                                <option selected>-- Jenis Surat --</option>
                                                @foreach ($jenisSurat as $item)
                                                    <option value="{{ $item->id }}">{{ $item->jenis_surat }}</option>
                                                @endforeach
                                            </select>
                                            @error('jenis_surat_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Asal Surat</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="asal_surat" id="asal_surat" class="form-control"
                                                placeholder="Asal Surat..." required>
                                            @error('asal_surat')
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
