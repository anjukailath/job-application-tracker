
@extends('layouts.app')

@section('title', 'Application Details')

@section('content')

<div class="card card-body">

    <h1 class="h3">{{ $application->job_title }}</h1>

    <p class="text-secondary">
        {{ $application->company_name }}
        ·
        {{ $application->location }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $application->status }}
    </p>

    <p>
        <strong>Applied:</strong>
        {{ $application->applied_date?->format('d M Y') ?? '—' }}
    </p>

    @if ($application->job_url)
        <p>
            <a href="{{ $application->job_url }}"
               target="_blank"
               rel="noopener noreferrer">
                Open job listing
            </a>
        </p>
    @endif

    <p>
        <strong>Notes:</strong><br>
        {{ $application->notes ?: 'No notes added.' }}
    </p>

    <a class="btn btn-primary align-self-start"
       href="{{ route('applications.edit', $application) }}">
        Edit application
    </a>

</div>

<h2 class="h5 mt-4">Interviews</h2>

@forelse ($application->interviews as $interview)

    <div class="card card-body mb-2">

        <strong>
            {{ $interview->interview_date->format('d M Y, g:i A') }}
        </strong>

        {{ $interview->interview_type }}
        ·
        {{ $interview->interviewer_name }}

        <p class="mb-0">
            {{ $interview->notes }}
        </p>

    </div>

@empty

    <p>No interviews scheduled yet.</p>

@endforelse

@endsection
