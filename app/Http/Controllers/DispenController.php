<?php

namespace App\Http\Controllers;

use App\Models\Dispen;
use Illuminate\Http\Request;

class DispenController extends Controller
{
    public function create()
    {
        return view('dispen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required|string|max:255',
            'waktu' => 'required|date',
            'tempat' => 'required|string|max:255',
            'mahasiswa' => 'required|array|min:1',
            'mahasiswa.*' => 'required|string|max:255',
        ]);


        Dispen::create([
            'nama_acara' => $request->nama_acara,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'mahasiswa' => json_encode($request->mahasiswa),
            'status' => 'Menunggu',
        ]);

        return redirect()->route('dispen.create')->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function index()
{
    $dispens = \App\Models\Dispen::orderBy('created_at', 'desc')->get();
    return view('dispen.index', compact('dispens'));
}

public function show($id)
{
    $dispen = Dispen::findOrFail($id);
    return view('dispen.show', compact('dispen'));
}

}
