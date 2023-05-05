@extends('layout.main')

@section('title', 'Tambah Fakultas')
@section('subtitle', 'Fakultas')
@section('content')

<h2>Tambah Fakultas</h2>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-description">
              Tambah Fakultas Baru
            </p>
            <form class="forms-sample" action="{{ route('fakultas.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Nama Fakultas</label>
                    <input type="text" class="form-control" name="nama_fakultas" placeholder="Nama Fakultas">
                    @error('nama_fakultas')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Dekan</label>
                    <input type="text" class="form-control" name="nama_dekan" placeholder="Nama Dekan">
                    @error('nama_dekan')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Wakil Dekan</label>
                    <input type="text" class="form-control" name="nama_wakil_dekan" placeholder="Nama Wakil Dekan">
                    @error('nama_wakil_dekan')
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
                  <a href="{{ route('fakultas.index') }}" class="btn btn-light">Cancel</button>
                </form>
            </div>
          </div>
        </div>
</div>

@endsection