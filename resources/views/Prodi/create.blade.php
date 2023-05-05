@extends('layout.main')

@section('title', 'Tambah Prodi')
@section('subtitle', 'Prodi')
@section('content')

    <h2>Tambah Prodi</h2>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">
                        Tambah Prodi Baru
                    </p>
                    <form class="forms-sample" action="{{ route('prodi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_prodi">Nama Prodi</label>
                            <input value="{{ old('nama_prodi') }}" type="text" class="form-control" name="nama_prodi"
                                placeholder="Nama Prodi">
                            @error('nama_prodi')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Nama Fakultas</label>
                            <select name="fakultas_id" class="form-control js-example-basic-single">
                                <option value="">Pilih Nama Fakultas</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item['id'] }}"> {{ $item['nama_fakultas'] }}</option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
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
                        <a href="{{ route('prodi.index') }}" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
