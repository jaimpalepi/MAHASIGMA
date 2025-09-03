<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function layanan(){
        return view('admin.layanan.layanan');
    }

    public function showSettings()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'upcoming_events_count' => 'required|integer|min:1',
        ]);

        Setting::where('key', 'upcoming_events_count')->update(['value' => $request->upcoming_events_count]);

        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
