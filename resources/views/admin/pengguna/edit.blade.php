@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit Data Pengguna</h6>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-2">
                        <form action="{{ route('admin.pengguna.update', $pengguna->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="name" class="mb-2">Nama Pengguna</label>
                                        <div class="input-group input-group-outline">
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ $pengguna->name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="email" class="mb-2">Email</label>
                                        <div class="input-group input-group-outline">
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $pengguna->email }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="password" class="mb-2">Password Baru (Kosongkan jika tidak
                                            diubah)</label>
                                        <div class="input-group input-group-outline">
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="role" class="mb-2">Role Pengguna</label>
                                        <div class="input-group input-group-outline">
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="Pelanggan"
                                                    {{ $pengguna->role == 'Pelanggan' ? 'selected' : '' }}>Pelanggan
                                                </option>
                                                <option value="Administrator"
                                                    {{ $pengguna->role == 'Administrator' ? 'selected' : '' }}>
                                                    Administrator
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="jenis_kelamin" class="mb-2">Jenis Kelamin</label>
                                        <div class="input-group input-group-outline">
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                                <option value="Laki-Laki"
                                                    {{ $pengguna->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                    Laki-Laki</option>
                                                <option value="Perempuan"
                                                    {{ $pengguna->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="tgl_lahir" class="mb-2">Tanggal Lahir</label>
                                        <div class="input-group input-group-outline">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                                value="{{ $pengguna->tgl_lahir }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="telepon" class="mb-2">Telepon</label>
                                        <div class="input-group input-group-outline">
                                            <input type="text" name="telepon" id="telepon" class="form-control"
                                                value="{{ $pengguna->telepon }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="photo" class="mb-2">Foto Profil</label>
                                        <div class="input-group input-group-outline">
                                            <input type="file" name="photo" id="photo" class="form-control">
                                        </div>
                                        @if ($pengguna->photo)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $pengguna->photo) }}" alt="Current photo"
                                                    class="avatar avatar-md me-3 border-radius-lg">
                                                <span class="text-sm">Current photo</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn bg-gradient-dark">Update</button>
                                    <a href="{{ route('admin.pengguna.index') }}"
                                        class="btn btn-outline-dark">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
