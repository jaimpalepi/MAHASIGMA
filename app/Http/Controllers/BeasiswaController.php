<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeasiswaApply;
use App\Models\Beasiswa;
use App\Models\RequirementsBeasiswa;
use App\Models\Requirements;
use App\Models\Hero;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class BeasiswaController extends Controller
{
    public function beasiswa(){
        $beasiswas = Beasiswa::orderBy('deadline', 'desc')->get();
        $hero = Hero::find(1);

        $today = Carbon::today();
        $nextWeek = Carbon::today()->addWeek();

        

        $beasiswaSoonEnd = Beasiswa::whereBetween('deadline', [$today, $nextWeek])->get();
        return view('beasiswa.beasiswa', ['beasiswas' => $beasiswas, 'beasiswaSoonEnd' => $beasiswaSoonEnd, 'hero' => $hero]);
    }

    public function beasiswaAll(){
        $beasiswas = Beasiswa::all();

        $today = Carbon::today();
        $nextWeek = Carbon::today()->addWeek();

        $jenjangList = Beasiswa::select('jenjang')->distinct()->pluck('jenjang');

        $beasiswaSoonEnd = Beasiswa::whereBetween('deadline', [$today, $nextWeek])->get();
        return view('beasiswa.beasiswaAll', ['beasiswas' => $beasiswas, 'beasiswaSoonEnd' => $beasiswaSoonEnd, 'jenjangList' => $jenjangList]);
    }

    public function beasiswa_table(){
        $beasiswas = Beasiswa::all();
        return view('beasiswa.beasiswa_table', ['beasiswas' => $beasiswas]);
    }

    public function beasiswa_detail($id){
        $checkApply = false;
        $applicationData = null;
        $beasiswa = Beasiswa::with('requirements')->find($id);
        if(BeasiswaApply::query()
        ->where('applicant_id', Auth::id())
        ->where('beasiswa_id', $id)
        ->where('status', 'pending')
        ->exists()){
            $checkApply = true;
            $applicationData = BeasiswaApply::with('user')
            ->where('applicant_id', Auth::id())
            ->where('beasiswa_id', $id)
            ->first();
        }
        return view('beasiswa.beasiswa_detail', ['beasiswa' => $beasiswa, 'checkApply' => $checkApply, 'applicationData' => $applicationData]);
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

    public function my_application(){
        $applications = BeasiswaApply::query()->where('applicant_id', Auth::id())->with('beasiswa')->get();
        return view('apply.my_application', ['applications' => $applications]);
    }

    public function apply_create($beasiswa){
        if (!Auth::check()) {
            return redirect()->route('login', ['redirect' => route('apply.create', $beasiswa)]);
        }

        $beasiswa1 = Beasiswa::find($beasiswa);
        $requirements = RequirementsBeasiswa::query()->where('beasiswa_id', $beasiswa)->with('requirement')->get();
        return view('apply.apply', ['beasiswa' => $beasiswa, 'requirements' => $requirements, 'beasiswa1' => $beasiswa1]);
    }

    public function apply_store(Request $request)
    {
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
            'applicant_id' => Auth::id(),
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

    public function beasiswa_create(){
        $requirements = Requirements::all();
        return view('beasiswa.beasiswa_create', ['requirements' => $requirements]);
    }

    public function beasiswa_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'pdf' => 'required',
            'desc' => 'required|string',
            'provider' => 'required|string',
            'jenjang' => 'required|string',
            'amount' => 'required|string',
            'quota' => 'required|integer|min:1',
            'qualifications' => 'array',
            'qualifications.*' => 'string',
            'benefits' => 'array',
            'benefits.*' => 'string',
            'open' => 'required|date|after_or_equal:today',
            'deadline' => 'required|date|after:open',
            'requirements' => 'required|array',
            'requirements.*' => 'string',
        ]);

        $path = null;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = uniqid('cover_') . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('documents/cover', $fileName, 'public');
        }

        $pdfFile = $request->file('pdf');
        $pdfPath = $pdfFile->storeAs('documents/PDFs', uniqid('PDF_') . '.' . $pdfFile->getClientOriginalExtension(), 'public');

        $beasiswa = Beasiswa::create([
            'title' => $request->name,
            'cover' => $path,
            'description' => $request->desc,
            'official_website' => $request->website,
            'contact_person' => $request->contact,
            'pdf' => $pdfPath,
            'provider' => $request->provider,
            'jenjang' => $request->jenjang,
            'amount' => $request->amount,
            'quota' => $request->quota,
            'qualifications' => $request->qualifications,
            'benefits' => $request->benefits,
            'open' => $request->open,
            'deadline' => $request->deadline,
            'status' => 'Available'
        ]);
        
        $requirementIds = [];

        $requirements = $request->requirements;

        foreach ($requirements as $reqText) {
            $requirement = Requirements::firstOrCreate(['name' => $reqText]);
            $requirementIds[] = $requirement->id;
        }

        $beasiswa->requirements()->sync($requirementIds);

        return redirect()->route('beasiswa');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::with('requirements')->findOrFail($id);
        $all_requirements = Requirements::all();
        return view('beasiswa.beasiswa_edit', compact('beasiswa', 'all_requirements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $beasiswa = Beasiswa::findOrFail($request->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'cover' => 'nullable|image|max:2048',
            'desc' => 'required|string',
            'provider' => 'required|string|max:255',
            'amount' => 'required|string',
            'quota' => 'required|integer|min:1',
            'deadline' => 'required|date',
            'requirements' => 'required|array',
            'requirements.*' => 'exists:requirements,id',
        ]);

        $path = $beasiswa->cover;
        if ($request->hasFile('cover')) {
            // Delete old cover if it exists
            if ($beasiswa->cover) {
                Storage::disk('public')->delete($beasiswa->cover);
            }
            // Store new cover
            $file = $request->file('cover');
            $extension = $file->guessExtension() ?? $file->getClientOriginalExtension();
            $fileName = uniqid('cover_') . '.' . $extension;
            $path = $file->storeAs('documents/cover', $fileName, 'public');
        }

        $beasiswa->update([
            'title' => $request->name,
            'cover' => $path,
            'description' => $request->desc,
            'provider' => $request->provider,
            'amount' => $request->amount,
            'quota' => $request->quota,
            'deadline' => $request->deadline,
        ]);

        $beasiswa->requirements()->sync($request->requirements);
        
        
        return redirect()->route('beasiswa.detail', $beasiswa->id)->with('success', 'Beasiswa updated successfully!');
    }

    public function beasiswa_delete($id){
        $beasiswa = Beasiswa::find($id);
        Storage::disk('public')->delete($beasiswa->cover);
        Beasiswa::destroy($id);
        return redirect()->route('beasiswa.table');
    }

    public function edit_hero(){
        $hero = Hero::find(1);
        return view('beasiswa.hero', ['hero' => $hero]);
    }

    public function update_hero(Request $request){  
        $hero = Hero::find(1);

        $request->validate([
            'heroImage' => 'nullable|image|max:2048',
        ]);

        $path = $hero->heroImage;
        if ($request->hasFile('heroImage')) {
            // Delete old cover if it exists
            if ($hero->heroImage) {
                Storage::disk('public')->delete($hero->heroImage);
            }
            // Store new cover
            $file = $request->file('heroImage');
            $extension = $file->guessExtension() ?? $file->getClientOriginalExtension();
            $fileName = uniqid('heroImage_') . '.' . $extension;
            $path = $file->storeAs('documents/heroImage', $fileName, 'public');
        }
        
        $hero->update([
            'heroImage' => $path,
            'bigText' => $request->bigText,
            'smallText' => $request->smallText,
        ]);

        return redirect()->route('beasiswa');
    }
}
