
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label class="form-label">Company name *</label>
    <input class="form-control"
           name="company_name"
           required
           maxlength="150"
           value="{{ old('company_name', $application->company_name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Job title *</label>
    <input class="form-control"
           name="job_title"
           required
           maxlength="150"
           value="{{ old('job_title', $application->job_title ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Location</label>
    <input class="form-control"
           name="location"
           value="{{ old('location', $application->location ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Job URL</label>
    <input class="form-control"
           type="url"
           name="job_url"
           value="{{ old('job_url', $application->job_url ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Applied date</label>
    <input class="form-control"
           type="date"
           name="applied_date"
           value="{{ old('applied_date', isset($application) ? $application->applied_date?->format('Y-m-d') : '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Status *</label>
    <select class="form-select" name="status" required>

        @foreach (['Saved','Applied','Assessment','Interview','Offer','Rejected','Withdrawn'] as $status)
            <option value="{{ $status }}"
                @selected(old('status', $application->status ?? 'Saved') === $status)>
                {{ $status }}
            </option>
        @endforeach

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Salary (optional)</label>
    <input class="form-control"
           type="number"
           min="0"
           step="0.01"
           name="salary"
           value="{{ old('salary', $application->salary ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Notes</label>
    <textarea class="form-control"
              name="notes"
              rows="3">{{ old('notes', $application->notes ?? '') }}</textarea>
</div>

<div class="d-flex justify-content-end gap-2">
    <button type="submit" class="btn btn-primary">
        Save application
    </button>

    <a class="btn btn-secondary"
       href="{{ route('applications.index') }}">
        Cancel
    </a>

</div>

