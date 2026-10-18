<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobApplicationController extends Controller
{
    private function rules(): array
    {
        return [
            'company_name' => ['required', 'string', 'max:150'],
            'job_title' => ['required', 'string', 'max:150'],
            'location' => ['nullable', 'string', 'max:150'],
            'job_url' => ['nullable', 'url', 'max:2000'],
            'applied_date' => ['nullable', 'date'],
            'status' => ['required', Rule::in([
                'Saved', 'Applied', 'Assessment',
                'Interview', 'Offer', 'Rejected', 'Withdrawn'
            ])],
            'salary' => ['nullable', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string', 'max:5000'],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->user()->applications()->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status')->toString());
        }

        if ($request->filled('search')) {
            $term = $request->string('search')->toString();

            $query->where(function ($q) use ($term) {
                $q->where('company_name', 'like', "%{$term}%")
                  ->orWhere('job_title', 'like', "%{$term}%");
            });
        }

        $applications = $query->paginate(10)->withQueryString();

        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        $request->user()->applications()->create($data);

        return redirect()->route('applications.index')
            ->with('success', 'Application saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $application = $request->user()->applications()
            ->with('interviews')->findOrFail($id);

        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $application = $request->user()->applications()
            ->findOrFail($id);

        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $application = $request->user()->applications()
            ->findOrFail($id);

        $application->update($request->validate($this->rules()));

        return redirect()->route('applications.index')
            ->with('success', 'Application updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $application = $request->user()->applications()
            ->findOrFail($id);

        $application->delete();

        return redirect()->route('applications.index')
            ->with('success', 'Application deleted.');
    }
}
