<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               // Validasi data yang diterima dari form
               $request->validate([
                'nama' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'cabang' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'no_telp' => 'required|string|min:12',
                'alasan' => 'required|string',
                'pendaftaran' => 'required|string|max:255',
            ]);

            // Buat instance baru dari model yang sesuai
            $data = new Permohonan();
            $data->nama = $request->input('nama');
            $data->nama_ibu = $request->input('nama_ibu');
            $data->cabang = $request->input('cabang');
            $data->jabatan = $request->input('jabatan');
            $data->no_telp = $request->input('no_telp');
            $data->alasan = $request->input('alasan');
            $data->pendaftaran = $request->input('pendaftaran');

            // Simpan data ke dalam database
            $data->save();

            // Redirect ke halaman yang diinginkan dengan pesan sukses
            return redirect('success')->with('success', 'Data berhasil disimpan.');
    }

    public function success()
    {
        return view('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
