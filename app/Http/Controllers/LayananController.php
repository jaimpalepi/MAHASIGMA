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

    public function detail($id){
        $layanan = Layanan::find($id);
        return view('admin.layanan.detail', compact(['layanan']));
    }

    public function edit($id){
        $layanan = Layanan::find($id);
        return view('admin.layanan.edit', compact(['layanan']));
    }

    public function update(Request $request){
        $request->validate([
            'layanan' => 'required',
            'text' => 'required',
        ]);

        $link = $request->link ?: null;

        $layananNew = Layanan::find($request->id);

        $layananNew->update([
            'layanan' => $request->layanan,
            'text' => $request->text,
            'link' => $link,
        ]);

        return redirect()->route('admin.layanan');
    }

    public function delete($id){
        Layanan::destroy($id);
        return redirect()->route('admin.layanan');
    }
}
