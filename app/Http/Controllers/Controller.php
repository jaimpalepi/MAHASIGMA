<?php

namespace App\Http\Controllers;

abstract class Controller
{
//     public function store(Request $request)
// {
//     $request->validate([
//         'ktp' => 'required|file|mimes:pdf,jpg,png|max:2048',
//         'transcript' => 'required|file|mimes:pdf,jpg,png|max:2048',
//     ]);

//     $ktpPath = $request->file('ktp')->store('documents/ktp', 'public');
//     $transcriptPath = $request->file('transcript')->store('documents/transcript', 'public');

//     BeasiswaApply::create([
//         'user_id' => auth()->id(),
//         'beasiswa_id' => 1, // or from the route/form
//         'submitted_at' => now(),
//         'status' => 'pending',
//         'documents' => json_encode([
//             'ktp' => $ktpPath,
//             'transcript' => $transcriptPath,
//         ]),
//     ]);

//     return redirect()->back()->with('success', 'Berhasil apply, semoga hoki, Onii-chan~ (＾▽＾)');
// }

}
