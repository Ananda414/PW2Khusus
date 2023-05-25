<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\prodi;
use App\Models\fakultas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('search');
        if ($keyword) {
            $mahasiswa = Mahasiswa::where('nama', 'LIKE', '%' .$keyword. '%')->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::paginate(10);
        }
        // dd($mahasiswa);
         return view ('mahasiswa.index')->with('mahasiswas', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodi::orderBy('nama_prodi', 'ASC')->get();
        return view('mahasiswa/create')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'npm' => 'required | unique:mahasiswa',
            'nama_mahasiswa' => 'required',
            'tanggal_lahir' => 'required',
            'kota_lahir' => 'required',
            'prodi_id' => 'required',
            'foto' => 'required'
        ]);

        // dd($validasi);
        $mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $validasi['npm'];
        $mahasiswa->nama = $validasi['nama_mahasiswa'];
        $mahasiswa->tanggal_lahir = $validasi['tanggal_lahir'];
        $mahasiswa->kota_lahir = $validasi['kota_lahir'];
        $mahasiswa->prodi_id = $validasi['prodi_id'];
        // $mahasiswa->foto = $validasi['foto'];

        $ext = $request->foto->getClientOriginalExtension();
        $new_filename = $validasi['npm']. ".".$ext;
        $request->foto->storeAs('public/images', $new_filename);

        $mahasiswa->foto = $new_filename;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', "Data mahasiswa". $validasi['nama_mahasiswa']. " berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = prodi::orderBy('nama_prodi', 'ASC')->get();
        return view('mahasiswa.edit')->with('mahasiswa', $mahasiswa)->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validasi = $request->validate([
            'nama_mahasiswa' => 'required',
            'tanggal_lahir' => 'required',
            'kota_lahir' => 'required',
            'prodi_id' => 'required',
            'foto' => 'required'
        ]);

        $mahasiswa->npm = $mahasiswa->npm;
        $mahasiswa->nama = $validasi['nama_mahasiswa'];
        $mahasiswa->tanggal_lahir = $validasi['tanggal_lahir'];
        $mahasiswa->kota_lahir = $validasi['kota_lahir'];
        $mahasiswa->prodi_id = $validasi['prodi_id'];
        // $mahasiswa->foto = $validasi['foto'];

        $ext = $request->foto->getClientOriginalExtension();
        $new_filename = $mahasiswa->npm. ".".$ext;
        $request->foto->storeAs('public/images', $new_filename);

        $mahasiswa->foto = $new_filename;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', "Data mahasiswa". $validasi['nama_mahasiswa']. " berhasil disimpan");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        // return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
        return response("data berhasil dihapus", 200);
    }

    public function multiDelete(Request $request) {
        mahasiswa::whereIn('id', $request->get('selected'))->delete();
        return response("selected mahasiswa(s) delete successfully", 200);
    }
}
