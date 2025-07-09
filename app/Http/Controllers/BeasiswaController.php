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
}
