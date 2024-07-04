@extends('layout.app')

@section('section')
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Update Data Petugas</h5>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card rounded shadow">
                    <div class="p-4">
                        <a href="{{ route('petugasUser.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('petugasUser.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Petugas</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                value="{{ $data->nama_lengkap }}" class="form-control"
                                                placeholder="Nama Petugas..." required>
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="form-icon position-relative">
                                            <input type="email" name="email" id="email" value="{{ $data->email }}"
                                                class="form-control" placeholder="Email..." required>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="username" id="username"
                                                value="{{ $data->user->username }}" class="form-control"
                                                placeholder="Username..." required>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Telp/No.HP</label>
                                        <div class="form-icon position-relative">
                                            <input type="text" name="telp" id="telp" value="{{ $data->telp }}"
                                                class="form-control" placeholder="No Hp..." required>
                                            @error('telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <div class="form-icon position-relative">
                                            <textarea name="alamat" id="alamat" rows="2" cols="1" class="form-control" placeholder="Alamat..."
                                                required>{{ $data->alamat }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <div class="form-icon position-relative">
                                            <select class="form-select form-control" name="jenis_kelamin"
                                                aria-label="Default select example">
                                                <option selected>-- Jenis Kelamin --</option>
                                                <option @if ($data->jenis_kelamin == 'L') selected @endif value="L">
                                                    Laki - Laki</option>
                                                <option @if ($data->jenis_kelamin == 'P') selected @endif value="P">
                                                    Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <div class="form-icon position-relative">
                                            <select class="form-select form-control" name="role"
                                                aria-label="Default select example">
                                                <option selected>-- Role --</option>
                                                <option @if ($data->user->role == 'admin') selected @endif value="admin">
                                                    Admin</option>
                                                <option @if ($data->user->role == 'petugas') selected @endif value="petugas">
                                                    Petugas</option>
                                                <option @if ($data->user->role == 'user') selected @endif value="user">
                                                    User</option>
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
                                        <label class="form-label">Jabatan</label>
                                        <div class="form-icon position-relative">
                                            <select class="form-select form-control" name="jabatan"
                                                aria-label="Default select example">
                                                <option selected>-- Jabatan --</option>
                                                <option @if ($data->user->jabatan == 'staff_tu_yayasan') selected @endif
                                                    value="staff_tu_yayasan">Staff TU Yayasan</option>
                                                <option @if ($data->user->jabatan == 'staff_tu_sma') selected @endif
                                                    value="staff_tu_sma">Staff TU SMA</option>
                                                <option @if ($data->user->jabatan == 'staff_tu_smp') selected @endif
                                                    value="staff_tu_smp">Staff TU SMP</option>
                                                <option @if ($data->user->jabatan == 'staff_tu_sd') selected @endif
                                                    value="staff_tu_sd">Staff TU SD</option>
                                                <option @if ($data->user->jabatan == 'staff_tu_tk') selected @endif
                                                    value="staff_tu_tk">Staff TU TK</option>
                                            </select>
                                            @error('jabatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">TanggalLahir</label>
                                        <div class="form-icon position-relative">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir"
                                                value="{{ $data->tgl_lahir }}" class="form-control" required>
                                            @error('tgl_lahir')
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
