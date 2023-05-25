@extends('layout.main')

@section('title', 'Tambah Mahasiswa')
@section('subtitle', 'Mahasiswa')
@section('content')

    <h2>Tambah Mahasiswa</h2>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        Tambah Maasiswa Baru
                    </p>
                    <form class="forms-sample" action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_mahasiswa">Nama Mahasiswa</label>
                            <input value="{{ old('nama_mahasiswa') }}" type="text" class="form-control" name="nama_mahasiswa"
                                placeholder="Nama Mahasiswa">
                            @error('nama_mahasiswa')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input value="{{ old('npm') }}" type="text" class="form-control" name="npm"
                            placeholder="NPM">
                            @error('npm')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input value="{{ old('tanggal_lahir') }}" type="date" class="form-control" name="tanggal_lahir"
                                placeholder="Tanggal Lahir">
                            @error('tanggal_lahir')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kota_lahir">Kota Lahir</label>
                            <input value="{{ old('kota_lahir') }}" type="text" class="form-control" name="kota_lahir"
                                placeholder="Kota Lahir">
                            @error('kota_lahir')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="prodi_id">Prodi</label>
                            <select name="prodi_id" class="form-control js-example-basic-single">
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item['id'] }}"> {{ $item['nama_prodi'] }}</option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input value="{{'$mahasiswa->foto' }}" type="file" class="form-control" name="foto"
                                placeholder="Foto">
                            @error('foto')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Remember me
                                <i class="input-helper"></i></label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
