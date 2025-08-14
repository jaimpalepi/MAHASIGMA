<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function layanan(){
        $layanans = Layanan::all();
        return view('layanan', compact(['layanans']));
    }

    public function add(){
        return view('admin.layanan.add');
    }

    public function store(Request $request){
        $request->validate([
            'layanan' => 'required',
            'text' => 'required',
        ]);

        $layanan = Layanan::create([
            'layanan' => $request->layanan,
            'text' => $request->text,
            'link' => $request->link
        ]);
        return redirect()->route('admin.layanan');
    }
}
