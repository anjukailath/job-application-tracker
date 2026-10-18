
@extends('layouts.app')

@section('title', 'My Job Applications')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">My Job Applications</h1>

    <a class="btn btn-primary"
       href="{{ route('applications.create') }}">
        + Add application
    </a>
</div>

<!-- Search and filter -->
<form class="row g-2 mb-3" method="GET">

    <div class="col-md-6">
        <input class="form-control"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search company or job title">
    </div>

    <div class="col-md-3">
        <select class="form-select" name="status">
            <option value="">All status</option>

            @foreach (['Saved','Applied','Assessment','Interview','Offer','Rejected','Withdrawn'] as $status)
                <option value="{{ $status }}"
                    @selected(request('status') === $status)>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <button class="btn btn-outline-primary">
            Filter
        </button>
    </div>

</form>

<!-- Applications table -->
<div class="card">
    <div class="table-responsive">

        <table class="table table-hover mb-0 align-middle">

            <thead>
                <tr>
                    <th>Company</th>
                    <th>Job title</th>
                    <th>Applied</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($applications as $application)
                    <tr>
                        <td>{{ $application->company_name }}</td>

                        <td>{{ $application->job_title }}</td>

                        <td>
                            {{ $application->applied_date?->format('d M Y') ?? '—' }}
                        </td>

                        <td>
                            <span class="badge text-bg-primary">
                                {{ $application->status }}
                            </span>
                        </td>

                        <td class="text-nowrap">

                            <a href="{{ route('applications.show', $application) }}">
                                View
                            </a>
                            |

                            <a href="{{ route('applications.edit', $application) }}">
                                Edit
                            </a>

                            <form class="d-inline"
                                  method="POST"
                                  action="{{ route('applications.destroy', $application) }}"
                                  onsubmit="return confirm('Delete this application?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-link text-danger p-0">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No applications yet. Add your first one.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $applications->links() }}
</div>

@endsection
