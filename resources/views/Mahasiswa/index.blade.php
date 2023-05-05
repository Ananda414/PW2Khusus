@extends('layout.main')

@section('title', 'Mahasiswa')
@section('subtitle', 'Halaman Mahasiswa')

@section('content')

    <p>Ini halaman mahasiswa</p>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Mahasiswa</h4>
                    <a href="{{ url('prodi/create') }}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>NPM</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $item)
                                    <tr>
                                        <td> {{ $item->nama_prodi }} </td>
                                        <td> {{ $item->fakultas->nama_fakultas }} </td>
                                        <td> {{ $item->created_at }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
