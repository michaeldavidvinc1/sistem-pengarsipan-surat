@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Disposisi Surat Masuk</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <a href="{{ route('disposisi.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('disposisi.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No Surat</label>
                                        <div class="form-icon position-relative">
                                            <select class="form-select form-control" name="surat_masuk_id"
                                                aria-label="Default select example">
                                                <option selected>-- No Surat --</option>
                                                @foreach ($surat_masuk as $item)
                                                    <option value="{{ $item->id }}">{{ $item->no_sm }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kepada</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="penerima_disposisi" id="penerima_disposisi"
                                                class="form-control" placeholder="Penerima..." required>
                                            @error('penerima_disposisi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sifat</label>
                                        <div class="form-icon position-relative">
                                            <select class="form-select form-control" name="sifat"
                                                aria-label="Default select example">
                                                <option selected>-- Sifat --</option>
                                                <option value="penting">Penting</option>
                                                <option value="rahasia">Rahasia</option>
                                                <option value="segera">Segera</option>
                                                <option value="biasa">Biasa</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Disposisi</label>
                                        <div class="form-icon position-relative">
                                            <input type="date" name="tgl_disposisi" id="tgl_disposisi"
                                                class="form-control" required>
                                            @error('tgl_disposisi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Dari</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="asal_surat" id="asal_surat" class="form-control"
                                                required>
                                            @error('asal_surat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <div class="form-icon position-relative">
                                            <textarea name="keterangan" id="keterangan" rows="2" cols="1" class="form-control"
                                                placeholder="Keterangan..." required></textarea>
                                            @error('berkas_sk')
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
