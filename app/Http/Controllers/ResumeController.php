<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Auth::user()->resumes()->latest()->get();
        return view('resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('resumes.create');
    }

    public function store(StoreResumeRequest $request)
    {
        Auth::user()->resumes()->create($request->validated());
        return redirect()->route('resumes.index')->with('success', 'Resume created successfully.');
    }

    public function show(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) abort(403);
        return view('resumes.show', compact('resume'));
    }

    public function edit(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) abort(403);
        return view('resumes.edit', compact('resume'));
    }

    public function update(UpdateResumeRequest $request, Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) abort(403);
        $resume->update($request->validated());
        return redirect()->route('resumes.index')->with('success', 'Resume updated successfully.');
    }

    public function destroy(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) abort(403);
        $resume->delete();
        return redirect()->route('resumes.index')->with('success', 'Resume deleted successfully.');
    }

    public function downloadPdf(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) abort(403);
        $pdf = Pdf::loadView('pdf.resume', compact('resume'));
        return $pdf->download('resume-'.$resume->id.'.pdf');
    }
}
