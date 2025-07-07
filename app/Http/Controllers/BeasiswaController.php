<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeasiswaApply;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function beasiswa(){
        $beasiswas = Beasiswa::all();
        return view('beasiswa.beasiswa', ['beasiswas' => $beasiswas]);
    }

    public function apply(){
        $beasiswas = Beasiswa::all();
        return view('apply.apply', ['beasiswas' => $beasiswas]);
    }

    public function apply_create(){
        return view('tes_upload');
    }

    public function apply_store(Request $request)
    {

        $ktpPath = $request->file('ktp')->store('documents/ktp', 'public');
        $transcriptPath = $request->file('transcript')->store('public');

        beasiswa_apply::create([
            'applicant_name' => "a",
            'beasiswa_id' => 1,
            'essay' => "aaa",
            'documents' => json_encode([
                'ktp' => $ktpPath,
                'transcript' => $transcriptPath,
            ]),
            'status' => 'pending',
        ]);

        return redirect('/');;
    }

    

    public function tes_store(Request $request)
    {

        $ktpPath = $request->file('ktp')->store('documents/ktp', 'public');
        $transcriptPath = $request->file('transcript')->store('public');

        beasiswa_apply::create([
            'applicant_name' => "a",
            'beasiswa_id' => 1,
            'essay' => "aaa",
            'documents' => json_encode([
                'ktp' => $ktpPath,
                'transcript' => $transcriptPath,
            ]),
            'status' => 'pending',
        ]);

        return redirect('/');;
    }
}
