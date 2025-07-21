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
            'lampiran' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('lampiran')->store('lampiran_dispensasi', 'public');

        Dispen::create([
            'nama_acara' => $request->nama_acara,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'lampiran' => $filePath,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('dispen.create')->with('success', 'Pengajuan berhasil dikirim.');
    }
}
