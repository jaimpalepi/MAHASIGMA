<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeasiswaApply;
use App\Models\Beasiswa;
use App\Models\RequirementsBeasiswa;
use App\Models\Requirements;

class BeasiswaController extends Controller
{
    public function beasiswa(){
        $beasiswas = Beasiswa::all();
        
        return view('beasiswa.beasiswa', ['beasiswas' => $beasiswas]);
    }

    public function beasiswa_detail($id){
        $beasiswa = Beasiswa::with('requirements')->find($id);
        return view('beasiswa.beasiswa_detail', ['beasiswa' => $beasiswa]);
    }

    public function applicant(){
        $applicants = BeasiswaApply::with('beasiswa')->get();
        return view('apply.applicant', ['applicants' => $applicants]);
    }

    public function applicant_detail($id){
        $applicant = BeasiswaApply::with('beasiswa')->find($id);
        $requirementNames = Requirements::pluck('name', 'id');
        return view('apply.applicant_detail', ['applicant' => $applicant, 'requirementNames' => $requirementNames]);
    }

    public function apply(){
        $beasiswas = Beasiswa::all();
        return view('apply.apply', ['beasiswas' => $beasiswas]);
    }

    public function apply_create($beasiswa){
        $requirements = RequirementsBeasiswa::query()->where('beasiswa_id', $beasiswa)->with('requirement')->get();
        return view('apply.apply', ['beasiswa' => $beasiswa, 'requirements' => $requirements]);
    }

    public function apply_store(Request $request)
    {
        // Handle dynamic requirement uploads
        $requirementFiles = $request->file('requirements');
        $requirementPaths = [];

        if ($requirementFiles) {
            foreach ($requirementFiles as $requirementId => $file) {
                $ext = $file->getClientOriginalExtension();
                $fileName = uniqid("req{$requirementId}_") . '.' . $ext;
                $path = $file->storeAs('documents/requirements', $fileName, 'public');
                $requirementPaths[$requirementId] = $path;
            }
        }

        BeasiswaApply::create([
            'applicant_name' => $request->name,
            'email' => $request->email,
            'beasiswa_id' => $request->beasiswa_id,
            'essay' => $request->essay,
            'documents' => [
                'requirements' => $requirementPaths,
            ],
            'status' => 'pending',
        ]);

        return redirect()->route('beasiswa')->with('success');
    }

    public function apply_delete($id){
        BeasiswaApply::destroy($id);
        return redirect()->route('applicant');
    }

    public function tes_store(Request $request)
    {

        beasiswa_apply::create([
            'applicant_name' => $request->name,
            'beasiswa_id' => $request->$b_id,
            'essay' => "aaa",
            'documents' => json_encode([
                'ktp' => $ktpPath,
                'transcript' => $transcriptPath,
            ]),
            'status' => 'pending',
        ]);

        return redirect('/');;
    }

    public function beasiswa_create(){
        $requirements = Requirements::all();
        return view('beasiswa.beasiswa_create', ['requirements' => $requirements]);
    }

    public function beasiswa_store(Request $request)
    {
        $file = $request->file('cover');
        $originalName = $file->getClientOriginalName(); 
        $path = $file->storeAs('documents/requirements', $originalName, 'public');          

        $request->validate([
            'name' => 'required|string|max:255',
            'cover' => 'required',
            'desc' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'quota' => 'required|integer|min:1',
            'deadline' => 'required|date|after:today',
            'requirements' => 'required|array',
            'requirements.*' => 'exists:requirements,id',
        ]);

        $beasiswa = Beasiswa::create([
            'title' => $request->name,
            'cover' => $path,
            'description' => $request->desc,
            'provider' => $request->provider,
            'amount' => $request->amount,
            'quota' => $request->quota,
            'deadline' => $request->deadline,
            'status' => 'Available'
        ]);

        // Sync requirements (many-to-many)
        $beasiswa->requirements()->sync($request->requirements);

        return redirect()->route('beasiswa');
    }
}
